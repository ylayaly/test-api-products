<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Product;
use App\Models\Currency;


class ProductApiTest extends TestCase
{
    use RefreshDatabase; 

    public function test_get_products_list()
    {
        Currency::factory()->count(2)->create();
        Product::factory()->count(3)->create();

        $response = $this->getJson('/api/products');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'name', 'description', 'currency'],
                ],
            ]);
    }

    public function test_create_product()
    {
        $currency = Currency::factory()->create();


        $data = [
            'name' => 'Camiseta',
            'description' => 'Camiseta de algodon',
            'price' => 120,
            'tax_cost' => 2.25,
            'manufacturing_cost' => 27.45,
            "currency" => $currency->name
        ];

        $response = $this->postJson('/api/products', $data);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'name' => 'Camiseta',
                    'description' => 'Camiseta de algodon',
                    'price' => 120,
                    'tax_cost' => 2.25,
                    'manufacturing_cost' => 27.45,
                    'currency' => [
                        "name" => $currency->name,
                        "symbol" => $currency->symbol,
                        "exchange_rate" => $currency->exchange_rate
                    ],
                ],
            ]);

        $this->assertDatabaseHas('products', [
                'name' => 'Camiseta',
                'description' => 'Camiseta de algodon',
                'price' => 120,
                'tax_cost' => 2.25,
                'manufacturing_cost' => 27.45,
                'currency_id' => $currency->id,
        ]);
    }


    public function test_get_single_product()
    {
        Currency::factory()->count(2)->create();
        $product = Product::factory()->create();

        $response = $this->getJson('/api/products/' . $product->id);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'tax_cost' => $product->tax_cost,
                    'manufacturing_cost' => $product->manufacturing_cost,
                    'currency' => [
                        "name" => $product->currency->name,
                        "symbol" => $product->currency->symbol,
                        "exchange_rate" => $product->currency->exchange_rate
                    ],
                ],
            ]);
    }

    public function test_update_product()
    {
        Currency::factory()->count(2)->create();

        $product = Product::factory()->create();
        $data = [
            'name' => 'Updated Product Name',
            'description' => 'Updated Product Description'
        ];

        $response = $this->putJson('/api/products/' . $product->id, $data);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name' => 'Updated Product Name',
                    'description' => 'Updated Product Description',
                    'price' => $product->price,
                    'tax_cost' => $product->tax_cost,
                    'manufacturing_cost' => $product->manufacturing_cost,
                    'currency' => [
                        "name" => $product->currency->name,
                        "symbol" => $product->currency->symbol,
                        "exchange_rate" => $product->currency->exchange_rate
                    ],
                ],
            ]);

        $this->assertDatabaseHas('products', $data);
    }

    public function test_delete_product()
    {
        Currency::factory()->count(2)->create();
        $product = Product::factory()->create();

        $response = $this->deleteJson('/api/products/' . $product->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_get_product_prices_list()
    {
        Currency::factory()->count(2)->create();
        Product::factory()->create();

        $response = $this->getJson('/api/products');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'name', 'description', 'currency'],
                ],
            ]);
    }

    public function test_create_product_prices()
    {
        $currency = Currency::factory()->create();


        $data = [
            'name' => 'Camiseta',
            'description' => 'Camiseta de algodon',
            'price' => 120,
            'tax_cost' => 2.25,
            'manufacturing_cost' => 27.45,
            "currency" => $currency->name
        ];

        $response = $this->postJson('/api/products', $data);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'name' => 'Camiseta',
                    'description' => 'Camiseta de algodon',
                    'price' => 120,
                    'tax_cost' => 2.25,
                    'manufacturing_cost' => 27.45,
                    'currency' => [
                        "name" => $currency->name,
                        "symbol" => $currency->symbol,
                        "exchange_rate" => $currency->exchange_rate
                    ],
                ],
            ]);

        $this->assertDatabaseHas('products', [
                'name' => 'Camiseta',
                'description' => 'Camiseta de algodon',
                'price' => 120,
                'tax_cost' => 2.25,
                'manufacturing_cost' => 27.45,
                'currency_id' => $currency->id,
        ]);
    }


}


