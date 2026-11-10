<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('history_approval_vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('owner_name');
            $table->string('owner_email');
            $table->string('owner_telp');
            $table->string('owner_profile')->nullable();

            $table->foreignId('vehicle_id')
                ->constrained('vehicles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
                
            $table->foreignId('type_id')
                ->constrained('vehicle_types')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('transmission_id')
                ->constrained('vehicle_transmissions')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('profile');
            $table->string('plate_number')->unique();
            $table->string('brand');
            $table->year('year');
            $table->string('color');
            $table->string('model');
            $table->text('description');
            $table->string('fuel_type');
            $table->string('engine_capacity');
            $table->string('seats');

            $table->string('front_photo');
            $table->string('left_photo');
            $table->string('right_photo');
            $table->string('back_photo');
            $table->string('odometer_photo');
            $table->string('chassis_photo');
            $table->string('selfie_photo');
            $table->string('stnk_photo');
            $table->date('stnk_due_date')->nullable();

            $table->foreignId('reviewer_id')
                ->nullable()
                ->constrained('users')
                ->nullOnUpdate()
                ->nullOnDelete();
            $table->string('reviewer_name');
            $table->string('reviewer_email');
            $table->string('reviewer_telp');
            $table->string('reviewer_profile')->nullable();


            $table->enum('status', ['Approved', 'Rejected'])->default('Approved');
            $table->string('rejected_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_approval_vehicles');
    }
};
