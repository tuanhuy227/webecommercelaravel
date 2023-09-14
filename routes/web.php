<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/trang-chu', 'App\Http\Controllers\HomeController@index');

Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/logout', 'App\Http\Controllers\AdminController@log_out');
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');
Route::post('/admin_dashboard', 'App\Http\Controllers\AdminController@dashboard');


//category-product
Route::get('/add_category_product', 'App\Http\Controllers\CategoryProductController@add_category_product');
Route::get('/all_category_product', 'App\Http\Controllers\CategoryProductController@all_category_product');
Route::post('/save_category_product', 'App\Http\Controllers\CategoryProductController@save_category_product');
Route::get('/edit_category_product/{category_product_id}', 'App\Http\Controllers\CategoryProductController@edit_category_product');
Route::get('/delete_category_product/{category_product_id}', 'App\Http\Controllers\CategoryProductController@delete_category_product');
Route::get('/active_category_product/{category_product_id}', 'App\Http\Controllers\CategoryProductController@active_category_product');
Route::get('/unactive_category_product/{category_product_id}', 'App\Http\Controllers\CategoryProductController@unactive_category_product');

Route::post('/update_category_product/{category_product_id}', 'App\Http\Controllers\CategoryProductController@update_category_product');

//brand
Route::get('/add_brand_product', 'App\Http\Controllers\BrandProductController@add_brand_product');
Route::get('/all_brand_product', 'App\Http\Controllers\BrandProductController@all_brand_product');
Route::post('/save_brand_product', 'App\Http\Controllers\BrandProductController@save_brand_product');
Route::get('/edit_brand_product/{brand_product_id}', 'App\Http\Controllers\BrandProductController@edit_brand_product');
Route::get('/delete_brand_product/{brand_product_id}', 'App\Http\Controllers\BrandProductController@delete_brand_product');
Route::get('/active_brand_product/{brand_product_id}', 'App\Http\Controllers\BrandProductController@active_brand_product');
Route::get('/unactive_brand_product/{brand_product_id}', 'App\Http\Controllers\BrandProductController@unactive_brand_product');

Route::post('/update_brand_product/{brand_product_id}', 'App\Http\Controllers\BrandProductController@update_brand_product');

//product

Route::get('/add_product', 'App\Http\Controllers\ProductController@add_product');
Route::get('/all_product', 'App\Http\Controllers\ProductController@all_product');
Route::post('/save_product', 'App\Http\Controllers\ProductController@save_product');
Route::get('/edit_product/{product_id}', 'App\Http\Controllers\ProductController@edit_product');
Route::get('/delete_product/{product_id}', 'App\Http\Controllers\ProductController@delete_product');
Route::get('/active_product/{product_id}', 'App\Http\Controllers\ProductController@active_product');
Route::get('/unactive_product/{product_id}', 'App\Http\Controllers\ProductController@unactive_product');

Route::post('/update_product/{product_id}', 'App\Http\Controllers\ProductController@update_product');