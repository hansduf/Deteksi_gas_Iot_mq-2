<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GasSensorReading;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GasSensorController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'nilai' => 'required|integer',
            'device_id' => 'nullable|string',
            'lokasi' => 'nullable|string'
        ]);

        // Tentukan status berdasarkan nilai gas
        $status = 'normal';
        if ($request->nilai > 400) {
            $status = 'bahaya';
        }

        $reading = GasSensorReading::create([
            'nilai_gas' => $request->nilai,
            'status' => $status,
            'device_id' => $request->device_id,
            'lokasi' => $request->lokasi
        ]);

        return response()->json([
            'message' => 'Data sensor berhasil disimpan',
            'data' => $reading
        ], 201);
    }

    public function index(): JsonResponse
    {
        $readings = GasSensorReading::latest()->take(10)->get();
        
        return response()->json([
            'data' => $readings
        ]);
    }
}
