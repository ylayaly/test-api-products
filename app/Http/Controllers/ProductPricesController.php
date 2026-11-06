<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductPrice;
use App\Http\Resources\ProductPriceResource;
use App\Http\Requests\StoreProductPriceRequest;

class ProductPricesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $product)
    {
        $prices = ProductPrice::where("product_id", $product)->get();
        return ProductPriceResource::collection($prices);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductPriceRequest $request, string $product)
    {
        $price = ProductPrice::create($request->validated());
        return new ProductPriceResource($price)
        ->response()
        ->setStatusCode(201);
    }

    
}
