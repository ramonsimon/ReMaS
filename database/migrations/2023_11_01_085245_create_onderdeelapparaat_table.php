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
        Schema::create('onderdeelapparaat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('onderdeel_id')->constrained('onderdelen');
            $table->foreignId('apparaat_id')->constrained('apparaten');
            $table->integer('percentage')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onderdeelapparaat');
    }
};
