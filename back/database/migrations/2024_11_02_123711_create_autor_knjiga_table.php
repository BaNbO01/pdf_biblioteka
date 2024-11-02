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
        Schema::create('autor_knjiga', function (Blueprint $table) {
            $table->foreignId('autor_id')->constrained('autori')->onDelete('cascade'); 
            $table->foreignId('knjiga_id')->constrained('knjige')->onDelete('cascade'); 
            $table->timestamps(); 
        });
        
    }

   
    public function down(): void
    {
        Schema::dropIfExists('autor_knjiga');
    }
};
