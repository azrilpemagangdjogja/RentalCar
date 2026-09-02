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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
                
            $table->foreignId('pickup_location_id')
                ->nullable()
                ->constrained('pickup_locations')
                ->nullOnUpdate()
                ->nullOnDelete();

            $table->foreignId('type_id')
                ->constrained('vehicle_types')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('profile');

            $table->string('plate_number')->unique();

            $table->string('brand');
            $table->year('year');
            $table->string('color')->nullable();
            $table->string('model');

            $table->enum('status', ['Active','Inactive','Not Available'])->default('Inactive');
            $table->text('description')->nullable();

            $table->integer('deposit_amount')->nullable();

            $table->string('fuel_type')->nullable();
            $table->string('transmission')->nullable();
            $table->string('engine_capacity')->nullable();
            $table->string('seats')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
