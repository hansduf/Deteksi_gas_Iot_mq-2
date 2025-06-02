<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasSensorReading extends Model
{
    use HasFactory;

    protected $fillable = [
        'gas_level',
        'status',
        'device_id',
        'location',
        'battery_level'
    ];

    protected $casts = [
        'gas_level' => 'float',
        'battery_level' => 'integer',
    ];
}
