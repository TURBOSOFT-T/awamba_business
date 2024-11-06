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
        Schema::table('users', function (Blueprint $table) {
            
            $table->enum("profile",["acheteur","vendeur"])->default("acheteur");
            $table->enum("type_vendeur",["Vendeur Particulier","Vendeur Commerçant","Entreprise"])->default("Entreprise");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->dropColumn("profile");
            $table->dropColumn("type_vendeur");
        });
    }
};
