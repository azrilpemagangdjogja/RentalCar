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
        Schema::create('vehicle_times', function (Blueprint $table) {
            $table->foreignId('time_id')
                ->constrained('rental_times')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('vehicle_id')
                ->constrained('vehicles')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->primary(['time_id', 'vehicle_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_times');
    }
};
