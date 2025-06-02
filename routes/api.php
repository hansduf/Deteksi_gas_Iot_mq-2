<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GasSensorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Gas Sensor Routes
Route::get('/gas', [GasSensorController::class, 'index']);
Route::post('/gas', [GasSensorController::class, 'store']);

// Test Route
Route::get('/test-api', function () {
    return response()->json(['message' => 'API works!']);
});  