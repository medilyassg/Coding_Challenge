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

    public function create($data)
    {
        return $this->model->create($data);
    }

    

    
    public function getAll()
    {
        return $this->model->all();
    }


    public function filterByCategory($categoryId)
    {
        return $this->model->whereHas('categories', function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        })->get();
    }

    public function sortByPrice($order = 'asc')
    {
        return $this->model->orderBy('price', $order)->get();
    }
}