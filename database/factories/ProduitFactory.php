<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $produit_name = $this->faker->unique()->words($nb=3, $asText=true);
        // $slug = Str::slug($produit_name, '-');
        // return [
        //     'name' => $produit_name,
        //     'slug' => $slug,
        //     'detail' => $this->faker->text(200),
        //     'description' => $this->faker->text(500),
        //     'prix' => $this->faker->numberBetween(1000, 100000),
        //     'quantite' => $this->faker->numberBetween(10, 50),
        //     'sku' => 'PRD'.$this->faker->unique()->numberBetween(100, 500),
        //     'stock_etat' => 'en stock',
        //     'images' => 'produit-'.$this->faker->numberBetween(1, 16),
        //     'id_categorie' => $this->faker->numberBetween(1, 5),
        //     // 'id_fournisseur' => $this->faker->numberBetween(1, 5)
        // ];
        return [];
    }
}
