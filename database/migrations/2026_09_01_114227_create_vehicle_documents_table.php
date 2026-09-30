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
        Schema::create('vehicle_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')
                ->constrained('vehicles')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

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

            $table->enum('status', ['Due', 'Expired', 'Valid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_albums');
    }
};
