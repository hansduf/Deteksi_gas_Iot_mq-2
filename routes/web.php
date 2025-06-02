<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index']);

// Dashboard Routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/devices', function () {
    return view('devices');
})->name('devices');

Route::get('/alerts', function () {
    return view('alerts');
})->name('alerts');

Route::get('/reports', function () {
    return view('reports');
})->name('reports');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');
