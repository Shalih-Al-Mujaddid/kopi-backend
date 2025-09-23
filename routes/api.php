<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

use App\Models\Product;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Promotion;
use App\Models\Customer;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API endpoints
Route::get('/products', fn() => Product::all());
Route::apiResource('banners', BannerController::class);
Route::apiResource('galleries', GalleryController::class); // Added this line
Route::get('/categories', fn() => Category::all());
Route::get('/orders', fn() => Order::all());
Route::get('/order-items', fn() => OrderItem::all());
Route::get('/promotions', fn() => Promotion::all());
Route::get('/customers', fn() => Customer::all());

Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/{id}', [OrderController::class, 'show']);

// Blogs API endpoints
Route::apiResource('blogs', BlogController::class);
