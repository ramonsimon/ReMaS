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
        Schema::create('rollen', function (Blueprint $table) {
            $table->id();
            $table->string('naam', 40)->unique();
            $table->string('omschrijving', 200)->nullable();
            $table->integer('waarde');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rollen');
    }
};
