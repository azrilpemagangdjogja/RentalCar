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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id')
                ->nullable()
                ->constrained('conversations')
                ->nullOnDelete()
                ->nullOnUpdate();

            $table->foreignId('receiver_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->enum('category', ['Announcement', 'Message']);

            $table->foreignId('sender_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->nullOnUpdate();

            $table->string('title')->nullable();
            $table->text('message');
            $table->enum('status', ['Readed', 'Unreaded'])->default('Unreaded');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
