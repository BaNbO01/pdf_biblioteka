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
        Schema::create('knjiga_zanr', function (Blueprint $table) {
            $table->foreignId('knjiga_id')->constrained('knjige')->onDelete('cascade'); 
            $table->foreignId('zanr_id')->constrained('zanrovi')->onDelete('cascade'); 
            $table->timestamps(); 
        });
        
    }

 
    public function down(): void
    {
        Schema::dropIfExists('knjiga_zanr');
    }
};
