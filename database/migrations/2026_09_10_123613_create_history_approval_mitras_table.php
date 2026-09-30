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
        Schema::create('history_approval_mitras', function (Blueprint $table) {
            $table->id();

            $table->foreignId('applicant_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->nullOnUpdate();
            $table->string('applicant_name');
            $table->string('applicant_email');
            $table->string('applicant_telp');
            $table->string('applicant_profile')->nullable();

            $table->foreignId('mitra_identity_id')
                ->nullable()
                ->constrained('mitra_identities')
                ->nullOnDelete()
                ->nullOnUpdate();
            $table->string('nik');
            $table->string('full_name');
            $table->string('ktp_photo');

            $table->foreignId('reviewer_id')
                ->nullable()
                ->constrained('users')
                ->nullOnUpdate()
                ->nullOnDelete();
            $table->string('reviewer_name')->nullable();
            $table->string('reviewer_email')->nullable();
            $table->string('reviewer_telp')->nullable();
            $table->string('reviewer_profile')->nullable();

            $table->enum('status', ['Approved', 'Rejected']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approval_mitras');
    }
};
