<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Console\Command;

class CreateProduct extends Command
{
    protected ProductRepository $repository;
    
    protected $signature = 'product:create';
    protected $description = 'Create a new product';

    public function __construct(ProductRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }


    public function handle()
    {
        $name = $this->ask('Enter the product name:');
        $description = $this->ask('Enter the product description:');
        $price = $this->ask('Enter the product price:');

        if (!is_numeric($price)) {
            $this->error('Price must be a numeric value.');
            return;
        }

        $categories = Category::pluck('name', 'id')->toArray();
        $selectedCategories = $this->choice('Select categories for the product (comma-separated):', $categories, null, null, true);
        $categoryIds = Category::whereIn('name', $selectedCategories)->pluck('id')->toArray();

        $product = $this->repository->create([
            'name' => $name,
            'price' => $price,
            'description' => $description
        ], $categoryIds);

        $this->info('Product created successfully!');
    }
}
