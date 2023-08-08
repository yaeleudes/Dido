<?php

use App\Models\Categorie;
use App\Models\Produit;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('detail')->nullable();
            $table->timestamps();
        });

        // Schema::table('produits', function(Blueprint $table){
        //     $table->foreignIdFor(\App\Models\Categorie::class)->constrained()->cascadeOnDelete();
        // });

        // Schema::create('categorie_produit', function(Blueprint $table){
        //     $table->foreignIdFor(Categorie::class);
        //     $table->foreignIdFor(Produit::class);
        //     $table->primary('categorie_id', 'produit_id');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cate_pro');
        Schema::dropIfExists('categories');
    }
};
