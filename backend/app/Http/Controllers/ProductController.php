<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Resources\ProductResource;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');
        $sortOrder = $request->input('sort_order');

        $products = $this->repository->getProducts($categoryId, $sortOrder);

        return ProductResource::collection($products);
    }



    public function store(CreateProductRequest $request)
    {
        
        $data = $request->validated();
        $categoryIds = $request->input('categories');

        $product = $this->repository->create($data,$categoryIds);

        return ProductResource::make($product);
    }

    
}
