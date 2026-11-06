<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPricesController;


Route::apiResource('products', ProductController::class);
Route::apiResource('products.prices', ProductPricesController::class)->only(['index', 'store']);



