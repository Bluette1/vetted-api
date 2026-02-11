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
        Schema::create('reminders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pet_id');
            $table->foreign('pet_id')->references('id')->on('pets')->cascadeOnDelete();
            $table->string('title');
            $table->enum('type', ['vaccination', 'medication', 'custom']);
            $table->date('date');
            $table->time('time');
            $table->boolean('recurring')->default(false);
            $table->boolean('completed')->default(false);
            $table->boolean('snoozed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reminders');
    }
};
