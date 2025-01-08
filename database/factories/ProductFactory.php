<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucfirst(fake()->word()),
            'brand' => ucfirst(fake()->word()),
            'description' => fake()->text(100),
            'price' => fake()->numberBetween(15000, 100000),
            'stock' => fake()->numberBetween(100, 1000),
            'unit' =>  rand(0, 1) ? 'Kardus' : 'Galon'
        ];
    }
}
