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
        Schema::create('wellness_entries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pet_id');
            $table->foreign('pet_id')->references('id')->on('pets')->cascadeOnDelete();
            $table->date('date');
            
            // 1=Low, 3=Normal, 5=High
            $table->unsignedTinyInteger('appetite')->nullable();
            $table->unsignedTinyInteger('energy')->nullable();
            $table->unsignedTinyInteger('mood')->nullable();
            
            // Bathroom habits (can be generic 1-5 or boolean flags later, for now simplifed to rating)
            $table->unsignedTinyInteger('bathroom')->nullable();
            $table->unsignedTinyInteger('activity')->nullable();
            
            $table->text('notes')->nullable();
            $table->timestamps();
            
            // Ensure one entry per pet per day
            $table->unique(['pet_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wellness_entries');
    }
};
