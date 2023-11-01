<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('apparaten', function (Blueprint $table) {
            $table->id();  // ID - PK, autoincrement
            $table->string('naam', 40)->unique(); // Naam van het apparaat. Uniek.
            $table->string('omschrijving', 200)->nullable(); // Omschrijving - kan null zijn
            $table->decimal('vergoeding'); // Vergoeding - als cur (decimal)
            $table->integer('gewicht_gram')->nullable(); // GewichtGram - kan null zijn
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apparaten');
    }
};
