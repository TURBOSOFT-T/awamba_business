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
        Schema::table('produit_taille', function (Blueprint $table) {
           // $table->unsignedBigInteger('taille_id');
           // $table->unsignedBigInteger('produit_id');
          //  $table->integer('stock')->default(0); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produit_taille', function (Blueprint $table) {
            
        //    $table->dropColumn('stock');
          //  $table->dropForeign(['taille_id', 'produit_id']);
        });
    }
};
