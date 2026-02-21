<?php

namespace Database\Factories;

use App\Models\ItemCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Items>
 */
class ItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $category_ids = ItemCategories::all()->pluck('id')->toArray();
        // [1,2,3,4,5]

        return [
            'name' => fake()->colorName(),
            'description' => fake()->country(),
            'stock' => fake()->numberBetween(1, 100),
            'category_id' => $category_ids[array_rand($category_ids)],
            'img_path' => 'https://www.birds.cornell.edu/home/wp-content/uploads/2023/09/334289821-Baltimore_Oriole-Matthew_Plante.jpg'
        ];
    }
}
