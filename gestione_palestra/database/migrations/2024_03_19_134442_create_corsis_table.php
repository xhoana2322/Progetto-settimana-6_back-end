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
        Schema::create('corsis', function (Blueprint $table) {
            $table->id();
            $table->string('titolo');
            $table->string('descrizione');
            $table->string('giorno');
            $table->dateTime('orario_inizio');
            $table->dateTime('orario_fine');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corsis');
    }
};
