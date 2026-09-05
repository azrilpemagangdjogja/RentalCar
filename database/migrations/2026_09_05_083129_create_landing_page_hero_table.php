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
        Schema::create('landing_page_hero', function (Blueprint $table) {
            $table->id();
            $table->string('background_image')->nullable();
            $table->string('badge')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('primary_button_text')->nullable();
            $table->string('primary_button_url')->nullable();
            $table->string('secondary_button_text')->nullable();
            $table->string('secondary_button_url')->nullable();
            $table->string('feature_1_title')->nullable();
            $table->string('feature_1_description')->nullable();
            $table->string('feature_2_title')->nullable();
            $table->string('feature_2_description')->nullable();
            $table->string('feature_3_title')->nullable();
            $table->string('feature_3_description')->nullable();
            $table->enum('status', ['Active', 'inactive'])->default('Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_page_hero');
    }
};
