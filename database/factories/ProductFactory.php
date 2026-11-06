<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
        $currencies = Currency::all();
        $baseCurrency = $currencies->random();

        return [
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10, 1000),
            'currency_id' => $baseCurrency->id,
            'tax_cost' => fake()->randomFloat(2, 0, 50),
            'manufacturing_cost' => fake()->randomFloat(2, 5, 500),
        ];
    }
}
