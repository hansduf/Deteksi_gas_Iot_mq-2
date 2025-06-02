<?php

namespace App\Http\Controllers;

use App\Models\GasSensorReading;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Get active devices with their latest readings (fixed subquery)
        $activeDevices = GasSensorReading::select('gas_sensor_readings.*')
            ->whereIn('id', function($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('gas_sensor_readings')
                    ->groupBy('device_id');
            })
            ->get();
        
        // 2. Get average gas level from the last hour
        $averageGasLevel = GasSensorReading::where('created_at', '>=', Carbon::now()->subHour())
            ->avg('gas_level') ?? 0;
        
        // 3. Get active alerts (fixed column name)
        $activeAlerts = GasSensorReading::where('gas_level', '>', 50)
            ->where('created_at', '>=', Carbon::now()->subDay())
            ->count();
        
        // 4. Get recent alerts (fixed column name)
        $recentAlerts = GasSensorReading::where('gas_level', '>', 50)
            ->latest()
            ->take(5)
            ->get();
        
        // 5. Get gas level trends for the last 24 hours with hourly data points
        $gasLevelTrends = collect(range(0, 23))->map(function($hour) {
            $hourStart = Carbon::now()->startOfHour()->subHours(23 - $hour);
            $hourEnd = $hourStart->copy()->endOfHour();
            
            $reading = GasSensorReading::whereBetween('created_at', [$hourStart, $hourEnd])
                ->avg('gas_level') ?? 0;

            return [
                'created_at' => $hourStart,
                'gas_level' => round($reading, 2)
            ];
        });

        // 6. Get device status distribution (with proper grouping)
        $deviceStatus = GasSensorReading::select(
                DB::raw("CASE 
                    WHEN gas_level <= 30 THEN 'normal'
                    WHEN gas_level <= 50 THEN 'warning'
                    ELSE 'alert'
                END as status"),
                DB::raw('COUNT(*) as count')
            )
            ->where('created_at', '>=', Carbon::now()->subHour())
            ->groupBy(DB::raw("CASE 
                WHEN gas_level <= 30 THEN 'normal'
                WHEN gas_level <= 50 THEN 'warning'
                ELSE 'alert'
            END"))
            ->get();

        return view('dashboard', compact(
            'activeDevices',
            'averageGasLevel',
            'activeAlerts',
            'recentAlerts',
            'gasLevelTrends',
            'deviceStatus'
        ));
    }
}