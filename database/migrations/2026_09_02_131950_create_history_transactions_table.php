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
        Schema::create('history_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')
                ->nullable()
                ->constrained('transactions')
                ->nullOnDelete()
                ->nullOnUpdate();

            $table->foreignId('customer_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->nullOnUpdate();

            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('customer_profile');

            $table->foreignId('mitra_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->nullOnUpdate();

            $table->string('mitra_name');
            $table->string('mitra_email');
            $table->string('mitra_phone');
            $table->string('mitra_profile');

            $table->foreignId('vehicle_id')
                ->nullable()
                ->constrained('vehicles')
                ->nullOnDelete()
                ->nullOnUpdate();

            $table->string('color');
            $table->string('transmission');
            $table->string('type');
            $table->string('plate_number');
            $table->string('fuel_type');
            $table->string('engine_capacity');
            $table->string('seats');
            $table->string('brand');
            $table->string('model');
            $table->string('profile');
            $table->string('deposit_amount');
            $table->string('year');

            $table->foreignId('type_id')
                ->nullable()
                ->constrained('vehicle_types')
                ->nullOnUpdate()
                ->nullOnDelete();

            $table->string('cancelled_reason');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_transactions');
    }
};
