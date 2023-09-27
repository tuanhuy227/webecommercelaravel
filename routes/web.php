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
Route::get('/tim_kiem', 'App\Http\Controllers\HomeController@search');

//danh muc san pham
Route::get('/danh_muc_san_pham/{category_id}', 'App\Http\Controllers\CategoryProductController@show_category_home');
Route::get('/chi_tiet_san_pham/{product_id}', 'App\Http\Controllers\ProductController@detail_product');
Route::get('/thuong_hieu_san_pham/{brand_id}', 'App\Http\Controllers\CategoryProductController@show_brand_home');

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
//cart

Route::post('/save_cart', 'App\Http\Controllers\CartController@save_cart');
Route::get('/show_cart', 'App\Http\Controllers\CartController@show_cart');
Route::get('/delete_to_cart/{rowId}', 'App\Http\Controllers\CartController@delete_to_cart');
Route::post('/update_cart_quantity', 'App\Http\Controllers\CartController@update_cart_quantity');
Route::get('/login_checkout', 'App\Http\Controllers\CheckoutController@login_checkout');
Route::get('/logout_checkout', 'App\Http\Controllers\CheckoutController@logout_checkout');


Route::post('/add_customer', 'App\Http\Controllers\CheckoutController@add_customer');
Route::get('/checkout', 'App\Http\Controllers\CheckoutController@checkout');
Route::post('/order_place', 'App\Http\Controllers\CheckoutController@order_place');
Route::post('/save_checkout_customer', 'App\Http\Controllers\CheckoutController@save_checkout_customer');
Route::post('/login_customer', 'App\Http\Controllers\CheckoutController@login_customer');
Route::get('/payment', 'App\Http\Controllers\CheckoutController@payment');


Route::get('/manage_order', 'App\Http\Controllers\CheckoutController@manage_order');
Route::get('/view_order/{order_id}', 'App\Http\Controllers\CheckoutController@view_order');
