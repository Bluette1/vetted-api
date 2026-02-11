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
        Schema::create('health_records', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pet_id');
            $table->foreign('pet_id')->references('id')->on('pets')->cascadeOnDelete();
            $table->enum('type', ['vaccination', 'medication', 'vet_visit', 'note']);
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('date');
            $table->string('document_path')->nullable(); // Store relative file path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_records');
    }
};
