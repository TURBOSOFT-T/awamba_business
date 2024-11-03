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
        Schema::create('produit_taille', function(Blueprint $table) {
            $table->id();
            $table->integer('stock')->default(0); 
            $table->unsignedBigInteger('taille_id');
            $table->unsignedBigInteger('produit_id');
          //  $table->foreignId('produit_id')->constrained()->onDelete('cascade');
           // $table->foreignId('taille_id')->constrained()->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_taille');
    }
};
