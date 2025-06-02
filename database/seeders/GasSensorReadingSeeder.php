<?php

namespace Database\Seeders;

use App\Models\GasSensorReading;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GasSensorReadingSeeder extends Seeder
{
    public function run(): void
    {
        // Create readings for the last 24 hours
        $devices = ['SENSOR001', 'SENSOR002', 'SENSOR003'];
        $locations = ['Room A', 'Room B', 'Room C'];
        
        for ($i = 0; $i < 24; $i++) {
            foreach ($devices as $index => $deviceId) {
                $gasLevel = rand(20, 80);
                $status = $gasLevel <= 30 ? 'normal' : ($gasLevel <= 50 ? 'warning' : 'alert');
                
                GasSensorReading::create([
                    'device_id' => $deviceId,
                    'location' => $locations[$index],
                    'gas_level' => $gasLevel,
                    'status' => $status,
                    'battery_level' => rand(60, 100),
                    'created_at' => now()->subHours($i),
                    'updated_at' => now()->subHours($i),
                ]);
            }
        }
    }
}
