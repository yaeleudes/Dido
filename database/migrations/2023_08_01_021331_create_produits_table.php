<?php

use App\Models\Categorie;
use App\Models\Marque;
use App\Models\User;
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
            $table->string('name');
            $table->string('slug');
            $table->string('detail');
            $table->text('description');
            $table->unsignedDouble('prix');
            $table->unsignedDouble('nprix')->nullable();
            $table->unsignedInteger('quantite');
            $table->string('sku')->unique();
            $table->enum('stock_etat', ['en stock', 'rupture de stock'])->default('en stock');            
            $table->text('image')->nullable();
            $table->foreignIdFor(User::class)->constrained();
            // $table->foreignIdFor(Categorie::class)->constrained();
            $table->foreignIdFor(Marque::class)->constrained();
            $table->timestamps();
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
