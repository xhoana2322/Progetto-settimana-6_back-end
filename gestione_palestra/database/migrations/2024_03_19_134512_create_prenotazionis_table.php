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
        Schema::create('prenotazionis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->foreign('users_id')->references('id')->on('users')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('corsis_id');        
            $table->foreign('corsis_id')->references('id')->on('corsis')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('isPending')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prenotazionis');
    }
};
