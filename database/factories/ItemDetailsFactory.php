<?php

namespace Database\Factories;

use App\Models\Items;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemDetails>
 */
class ItemDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'weight' => fake()->randomFloat(2, 1, 10),
            'length' => fake()->randomFloat(2, 1, 10),
            'width' => fake()->randomFloat(2, 1, 10),
            'height'=> fake()->randomDigitNotZero(),
            'manufacturer' => fake()->company()
        ];
    }
}
