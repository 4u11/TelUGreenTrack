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
        Schema::create('trashcans', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->enum('waste_type', ['organic', 'inorganic', 'hazardous']);
            $table->integer('capacity');
            $table->string('test_var')->nullable();
            $table->integer('fill_level')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trashcans');
    }
};
