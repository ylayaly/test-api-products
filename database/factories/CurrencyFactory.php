<?php

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Currency>
 */
class CurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $currencies = [
            ['name' => 'USD', 'symbol' => '$', 'exchange_rate' => 1.00],
            ['name' => 'EUR', 'symbol' => '€', 'exchange_rate' => 0.92],
            ['name' => 'JPY', 'symbol' => '¥', 'exchange_rate' => 149.50],
            ['name' => 'GBP', 'symbol' => '£', 'exchange_rate' => 0.79],
            ['name' => 'CNY', 'symbol' => '¥', 'exchange_rate' => 7.24],
            ['name' => 'AUD', 'symbol' => 'A$', 'exchange_rate' => 1.52],
            ['name' => 'CAD', 'symbol' => 'C$', 'exchange_rate' => 1.36],
            ['name' => 'CHF', 'symbol' => 'Fr', 'exchange_rate' => 0.88],
            ['name' => 'HKD', 'symbol' => 'HK$', 'exchange_rate' => 7.82],
            ['name' => 'SGD', 'symbol' => 'S$', 'exchange_rate' => 1.34],
        ];
 
        return fake()->randomElement($currencies);
    }
}
