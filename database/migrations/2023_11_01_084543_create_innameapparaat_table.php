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
        Schema::create('innameapparaat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inname_id')->constrained('innames');
            $table->foreignId('apparaat_id')->constrained('apparaten');
            $table->boolean('ontleed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('innameapparaat');
    }
};
