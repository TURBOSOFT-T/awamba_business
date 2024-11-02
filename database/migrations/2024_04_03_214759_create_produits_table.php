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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
          //  $table->string('tags')->nullable();
            $table->text('description')->nullable();
            $table->string('reference')->unique();
            $table->decimal('prix', 13, 2)->nullable();
            $table->decimal('prix_achat', 13, 2)->nullable();
            $table->string('photo');
            $table->unsignedBigInteger('id_promotion')->nullable()->default(null);
            $table->unsignedBigInteger("category_id")->nullable();
            $table->integer("stock")->default(10);
            $table->enum("statut",["disponible","indisponible"])->default("indisponible");
            $table->json('photos')->nullable();
            $table->boolean('top')->default(false);
            $table->boolean('sur_devis')->default(false);
            $table->integer('stock_alert')->default(10);
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('id_promotion')->references('id')->on('promotions')->onDelete('set null');
          //  $table->foreign('id_category')->references('id_category')->on('categories')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
