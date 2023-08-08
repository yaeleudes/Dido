<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorie>
 */
class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $categorie_name = $this->faker->unique()->words($nb=3, $asText=true);
        // $slug = Str::slug($categorie_name, '-');
        // return [
        //     'name' => $categorie_name,
        //     'slug' => $slug
        // ];
        return [];
    }
}
