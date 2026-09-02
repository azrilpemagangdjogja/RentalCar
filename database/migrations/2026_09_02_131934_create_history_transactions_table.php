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
                ->constrained('transactions')
                ->nullOnDelete()
                ->nullOnUpdate();

            $table->foreignId('costumer_id')
                ->constrained('users')
                ->nullOnDelete()
                ->nullOnUpdate();

            $table->string('costumer_name');
            $table->string('costumer_email');
            $table->string('costumer_phone');
            $table->string('costumer_profile');

            $table->foreignId('mitra_id')
                ->constrained('users')
                ->nullOnDelete()
                ->nullOnUpdate();

            $table->string('mitra_name');
            $table->string('mitra_email');
            $table->string('mitra_phone');
            $table->string('mitra_profile');

            $table->foreignId('vehicle_id')
                ->constrained('vehicles')
                ->nullOnDelete()
                ->nullOnUpdate();

            $table->string('color');
            $table->string('transmission');
            $table->string('type');
            $table->string('plate_number');
            $table->string('brand');
            $table->string('model');
            $table->string('model');

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
