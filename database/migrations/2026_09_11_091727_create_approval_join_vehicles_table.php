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
        Schema::create('approval_join_vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')
                ->nullable()
                ->constrained('vehicles')
                ->nullOnDelete()
                ->nullOnUpdate();
        
            $table->string('vehicle_brand');
            $table->string('vehicle_model');
            $table->string('vehicle_transmission');
            $table->string('vehicle_engine_capacity');
            $table->string('vehicle_seats');
            $table->string('vehicle_fuel_type');
            $table->string('vehicle_color');
            $table->string('vehicle_profile');
            $table->string('vehicle_plate_number');
            $table->string('vehicle_type');
            $table->string('vehicle_year');
            $table->string('vehicle_description');

            $table->foreignId('applicant_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->nullOnUpdate();

            $table->string('applicant_name');
            $table->string('applicant_email');
            $table->string('applicant_telp');
            $table->string('applicant_profile')->nullable();

            $table->foreignId('mitra_id')
                ->nullable()
                ->constrained('mitra_identities')
                ->nullOnUpdate()
                ->nullOnDelete();
            
            $table->string('mitra_full_name')->nullable();
            $table->string('mitra_nik', 16)->nullable();

            $table->foreignId('viewer_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->nullOnUpdate();

            $table->string('viewer_name')->nullable();
            $table->string('viewer_email')->nullable();
            $table->string('viewer_telp')->nullable();
            $table->string('viewer_profile')->nullable();

            $table->foreignId('location_id')
                ->nullable()
                ->constrained('pickup_locations')
                ->nullOnDelete()
                ->nullOnUpdate();
            
            $table->string('location_name')->nullable();
            $table->string('location_address')->nullable();
            $table->string('location_longitude')->nullable();
            $table->string('location_latitude')->nullable();
            $table->string('location_description')->nullable();

            $table->foreignId('owner_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->nullOnUpdate();

            $table->string('owner_name')->nullable();
            $table->string('owner_email')->nullable();
            $table->string('owner_telp')->nullable();
            $table->string('owner_profile')->nullable();

            $table->enum('status', ['Pending', 'Approved', 'Rejected', 'Cancelled'])->default('Pending');
            $table->string('rejected_reason')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approval_join_vehicles');
    }
};
