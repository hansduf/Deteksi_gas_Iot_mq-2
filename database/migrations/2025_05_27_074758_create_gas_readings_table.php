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
        Schema::create('gas_readings', function (Blueprint $table) {
            $table->id();
            $table->integer('value'); // Nilai gas dari sensor
            $table->enum('status', ['normal', 'warning', 'alert'])->default('normal'); // Status berdasarkan ambang batas
            $table->string('device_id')->nullable(); // ID perangkat (opsional untuk identifikasi perangkat)
            $table->string('location')->nullable(); // Lokasi sensor (opsional)
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gas_readings');
    }
};
