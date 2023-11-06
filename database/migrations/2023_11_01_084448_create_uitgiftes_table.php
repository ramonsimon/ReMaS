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
        Schema::create('uitgiftes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medewerker_id')->constrained('medewerkers');
            $table->foreignId('onderdeel_id')->constrained('onderdelen');
            $table->timestamp('tijdstip')->useCurrent();
            $table->integer('gewicht_kg');
            $table->decimal('prijs');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uitgiftes');
    }
};
