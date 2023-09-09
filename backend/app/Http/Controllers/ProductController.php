<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
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
        $products = $this->repository->filterByCategory($request->input('category_id'))
            ->sortByPrice($request->input('sort_order'));

        return [
            'records'=>$products
        ];
    }

    public function store(CreateProductRequest $request)
  {
    $data = $request->validated();

    $record = $this->repository->create($data);
    
    return $record;
  }

    
}
