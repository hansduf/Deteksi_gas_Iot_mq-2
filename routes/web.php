<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// Dashboard Routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

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
