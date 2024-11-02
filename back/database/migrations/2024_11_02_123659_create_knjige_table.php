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
        Schema::create('knjige', function (Blueprint $table) {
            $table->id();
            $table->string('naziv'); // Naziv knjige
            $table->string('putanja_slike'); // Putanja do slike knjige
            $table->string('putanja_pdf'); // Putanja do PDF fajla knjige
            $table->timestamps(); // Datum kreiranja i ažuriranja
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knjige');
    }
};
