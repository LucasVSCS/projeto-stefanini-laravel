<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::post('/orders/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');

Route::resources([
    'products' => ProductController::class,
    'orders' => OrderController::class,
]);
