<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterStatusController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\ReportController;

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
    return view('layout/dashboard');
});
Route::get('/home', function () {
    return view('layout/home');
})->name('home');
// status
Route::get('/form_status', function () {
    return view('master_status/form_input');
})->name('input');
Route::get('/master_status', [MasterStatusController::class, 'index'])->name('master_status.index');
Route::post('/status/input', [MasterStatusController::class, 'store'])->name('status.store');
Route::get('/master_status/{status_id}/edit', [MasterStatusController::class, 'edit'])->name('master_status.edit');
Route::put('/master_status/{status_id}/update', [MasterStatusController::class, 'update'])->name('master_status.update');
Route::delete('/master_status/{status_id}', [MasterStatusController::class, 'destroy'])->name('master_status.destroy');
// ================================================================================================================

// city
Route::get('/form_city', function () {
    return view('city/form_input');
})->name('input_city');
Route::get('/city', [CityController::class, 'index'])->name('city.index');
Route::post('/city/input', [CityController::class, 'store'])->name('city.store');
Route::get('/city/{city_id}/edit', [CityController::class, 'edit'])->name('city.edit');
Route::put('/city/{city_id}/update', [CityController::class, 'update'])->name('city.update');
Route::delete('/city/{city_id}', [CityController::class, 'destroy'])->name('city.destroy');
// ================================================================================================================

// user
Route::get('/form_user', function () {
    return view('user/form_input');
})->name('input_user');

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::post('/user/input', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{user_id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{user_id}/update', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{user_id}', [UserController::class, 'destroy'])->name('user.destroy');
// ================================================================================================================


// merchant

// Route::get('/form_merchant', function () {
//     return view('merchant/form_input');
// })->name('input_merchant');
Route::get('/merchant_form', [MerchantController::class, 'create'])->name('input_merchant');
Route::get('/merchant', [MerchantController::class, 'index'])->name('merchant.index');
Route::get('/merchant/create', [MerchantController::class, 'create'])->name('merchant.create');
Route::post('/merchant/input', [MerchantController::class, 'store'])->name('merchant.store');
Route::get('/merchant/{merchant_id}/edit', [MerchantController::class, 'edit'])->name('merchant.edit');
Route::put('/merchant/{merchant_id}/update', [MerchantController::class, 'update'])->name('merchant.update');
Route::delete('/merchant/{merchant_id}', [MerchantController::class, 'destroy'])->name('merchant.destroy');
// ================================================================================================================

//product
Route::get('/product_form', [ProductController::class, 'create'])->name('input_product');
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/input', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product_id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product_id}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product_id}', [ProductController::class, 'destroy'])->name('product.destroy');
// ================================================================================================================


// order item
Route::get('/order_form', [OrderItemController::class, 'create'])->name('input_order');
Route::get('/order', [OrderItemController::class, 'index'])->name('order.index');
Route::get('/order/create', [OrderItemController::class, 'create'])->name('order.create');
Route::post('/order/input', [OrderItemController::class, 'store'])->name('order.store');
Route::get('/order/{order_id}/edit', [OrderItemController::class, 'edit'])->name('order.edit');
Route::put('/order/{order_id}/update', [OrderItemController::class, 'update'])->name('order.update');
Route::delete('/order/{order_id}', [OrderItemController::class, 'destroy'])->name('order.destroy');
// ================================================================================================================

//order status
Route::get('/orderstat_from', [OrderStatusController::class, 'create'])->name('input_order_status');
Route::get('/orderstat', [OrderStatusController::class, 'index'])->name('orderstat.index');
Route::get('/orderstat/create', [OrderStatusController::class, 'create'])->name('orderstat.create');
Route::post('/orderstat/input', [OrderStatusController::class, 'store'])->name('orderstat.store');
Route::get('/orderstat/{order_id}/edit', [OrderStatusController::class, 'edit'])->name('orderstat.edit');
Route::put('/orderstat/{order_id}/update', [OrderStatusController::class, 'update'])->name('orderstat.update');
Route::delete('/orderstat/{order_id}', [OrderStatusController::class, 'destroy'])->name('orderstat.destroy');

// ================================================================================================================

Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::get('/get-sorted-data', [ReportController::class, 'getSortedData'])->name('getSortedData');
