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
        Schema::create('approval_vehicle_documents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('owner_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('type_id')
                ->constrained('vehicle_types')
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
            $table->string('transmission');
            $table->string('engine_capacity');
            $table->string('seats');

            $table->string('front_photo');
            $table->string('left_photo');
            $table->string('right_photo');
            $table->string('back_photo');
            $table->string('odometer_photo');
            $table->string('chassis_photo');

            $table->string('tax_proof_photo');
            $table->date('tax_due_date');

            $table->string('stnk_photo');
            $table->date('stnk_due_date');

            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->string('rejected_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approval_vehicle_documents');
    }
};
