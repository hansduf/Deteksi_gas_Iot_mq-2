<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gas_sensor_readings', function (Blueprint $table) {
            $table->id();
            $table->float('gas_level'); // Gas level in PPM
            $table->enum('status', ['normal', 'warning', 'alert'])->default('normal');
            $table->string('device_id');
            $table->string('location')->nullable();
            $table->integer('battery_level')->default(100); // Battery level in percentage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gas_sensor_readings');
    }
};
