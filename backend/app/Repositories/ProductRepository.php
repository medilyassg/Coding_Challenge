<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function create($data, $categoryIds)
    {

        $product = $this->model->create($data);

        $product->categories()->attach($categoryIds);

        return $product;
    }

    public function getProducts($categoryId, $sortOrder)
    {
        $query = $this->model->query();

        if (!empty($categoryId)) {
            $query->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        if (!empty($sortOrder)) {
            $query->orderBy('price', $sortOrder);
        }

        return $query->get();
    }
}
