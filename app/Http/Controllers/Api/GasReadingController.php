<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GasReading;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GasReadingController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'nilai' => 'required|integer',
            'device_id' => 'nullable|string',
            'location' => 'nullable|string'
        ]);

        // Tentukan status berdasarkan nilai gas
        $status = 'normal';
        if ($request->nilai > 400) {
            $status = 'alert';
        } elseif ($request->nilai > 200) {
            $status = 'warning';
        }

        $reading = GasReading::create([
            'value' => $request->nilai,
            'status' => $status,
            'device_id' => $request->device_id,
            'location' => $request->location
        ]);

        return response()->json([
            'message' => 'Gas reading saved successfully',
            'data' => $reading
        ], 201);
    }

    public function index(): JsonResponse
    {
        $readings = GasReading::latest()->take(10)->get();
        
        return response()->json([
            'data' => $readings
        ]);
    }
}
