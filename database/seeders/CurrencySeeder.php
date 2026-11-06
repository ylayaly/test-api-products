<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    use WithoutModelEvents;
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            ['name' => 'USD', 'symbol' => '$', 'exchange_rate' => 1.00],      // Dólar estadounidense
            ['name' => 'EUR', 'symbol' => '€', 'exchange_rate' => 0.92],      // Euro
            ['name' => 'JPY', 'symbol' => '¥', 'exchange_rate' => 149.50],    // Yen japonés
            ['name' => 'GBP', 'symbol' => '£', 'exchange_rate' => 0.79],      // Libra esterlina
            ['name' => 'CNY', 'symbol' => '¥', 'exchange_rate' => 7.24],      // Yuan chino
            ['name' => 'AUD', 'symbol' => 'A$', 'exchange_rate' => 1.52],     // Dólar australiano
            ['name' => 'CAD', 'symbol' => 'C$', 'exchange_rate' => 1.36],     // Dólar canadiense
            ['name' => 'CHF', 'symbol' => 'Fr', 'exchange_rate' => 0.88],     // Franco suizo
            ['name' => 'HKD', 'symbol' => 'HK$', 'exchange_rate' => 7.82],    // Dólar de Hong Kong
            ['name' => 'SGD', 'symbol' => 'S$', 'exchange_rate' => 1.34],     // Dólar de Singapur
            ['name' => 'MXN', 'symbol' => '$', 'exchange_rate' => 17.50],     // Peso mexicano
            ['name' => 'BRL', 'symbol' => 'R$', 'exchange_rate' => 4.97],     // Real brasileño
            ['name' => 'INR', 'symbol' => '₹', 'exchange_rate' => 83.50],    // Rupia india
            ['name' => 'KRW', 'symbol' => '₩', 'exchange_rate' => 1350.00],  // Won surcorean
        ];
 
        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
