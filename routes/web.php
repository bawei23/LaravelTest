<?php

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
    return view('auth.login');
});





Auth::routes();

Route::get('/create_product', [App\Http\Controllers\ProductController::class, 'create_product'])->middleware('auth')->name('create_product');
Route::post('/store_product', [App\Http\Controllers\ProductController::class, 'store_product'])->name('product.store');
Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->middleware('auth')->name('product');
Route::post('/dataproduct', [App\Http\Controllers\ProductController::class, 'dataproduct'])->middleware('auth')->name('dataproduct');
Route::post('/delete_product', [App\Http\Controllers\ProductController::class, 'delete_product'])->middleware('auth')->name('product.delete');
Route::post('/update_product', [App\Http\Controllers\ProductController::class, 'update_product'])->middleware('auth')->name('product.update');
Route::get('/edit_product/{id}', [App\Http\Controllers\ProductController::class, 'edit_product'])->name('edit_product');
Route::get('/detail_product/{id}', [App\Http\Controllers\ProductController::class, 'detail_product'])->name('detail_product');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
