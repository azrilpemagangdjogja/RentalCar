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
        Schema::create('landing_page_about', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description_1')->nullable();
            $table->text('description_2')->nullable();
            $table->string('feature_1_title')->nullable();
            $table->string('feature_1_description')->nullable();
            $table->string('feature_2_title')->nullable();
            $table->string('feature_2_description')->nullable();
            $table->string('card_title')->nullable();
            $table->string('card_description')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_page_about');
    }
};
