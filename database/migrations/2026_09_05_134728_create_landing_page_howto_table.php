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
        Schema::create('landing_page_howto', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Active', 'Inactive'])->default('Inactive');
            $table->string('subtitle')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('step_1_title')->nullable();
            $table->text('step_1_description')->nullable();
            $table->string('step_2_title')->nullable();
            $table->text('step_2_description')->nullable();
            $table->string('step_3_title')->nullable();
            $table->text('step_3_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_page_howto');
    }
};
