<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use WithFaker;

    public function test_can_create_product()
  {
    $product = Product::factory()->makeOne()->toArray();

    $response = $this->post(route('products.store'), $product);
    
    $response->assertStatus(201);

    $this->assertDatabaseHas('products', [
      'name' => $product['name'],
    ]);
  }
}
