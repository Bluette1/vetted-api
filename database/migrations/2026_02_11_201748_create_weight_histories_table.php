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
        Schema::create('weight_histories', function (Blueprint $table) {
            $table->id();
            $table->uuid('pet_id');
            $table->foreign('pet_id')->references('id')->on('pets')->cascadeOnDelete();
            $table->decimal('weight', 5, 2);
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weight_histories');
    }
};
