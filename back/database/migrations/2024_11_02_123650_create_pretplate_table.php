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
        Schema::create('pretplate', function (Blueprint $table) {
            $table->id();
            $table->integer('brojUMesecima'); 
            $table->decimal('cena', 8, 2); 
            $table->timestamps(); // Datum kreiranja i ažuriranja
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pretplate');
    }
};
