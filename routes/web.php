<?php

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
//frontend
Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index');

//Danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}','BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@detail');

//backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'AdminController@logout');

//Category product
Route::get('/add-category-product', 'CategoryProduct@add');
Route::get('/all-category-product', 'CategoryProduct@all');
Route::get('/edit-category-product/{category_product_id}', 'CategoryProduct@edit');
Route::get('/delete-category-product/{category_product_id}', 'CategoryProduct@delete');

Route::get('/unactive-category-product/{category_product_id}', 'CategoryProduct@unactive');
Route::get('/active-category-product/{category_product_id}', 'CategoryProduct@active');

Route::post('/save-category-product', 'CategoryProduct@save');
Route::post('/update-category-product/{category_product_id}', 'CategoryProduct@update');


//Brand product
Route::get('/add-brand-product', 'BrandProduct@add');
Route::get('/all-brand-product', 'BrandProduct@all');
Route::get('/edit-brand-product/{category_product_id}', 'BrandProduct@edit');
Route::get('/delete-brand-product/{brand_product_id}', 'BrandProduct@delete');

Route::get('/unactive-brand-product/{brand_product_id}', 'BrandProduct@unactive');
Route::get('/active-brand-product/{brand_product_id}', 'BrandProduct@active');

Route::post('/save-brand-product', 'BrandProduct@save');
Route::post('/update-brand-product/{brand_product_id}', 'BrandProduct@update');

//Product
Route::get('/add-product', 'ProductController@add');
Route::get('/all-product', 'ProductController@all');
Route::get('/edit-product/{product_id}', 'ProductController@edit');
Route::get('/delete-product/{product_id}', 'ProductController@delete');

Route::get('/unactive-product/{product_id}', 'ProductController@unactive');
Route::get('/active-product/{product_id}', 'ProductController@active');

Route::post('/save-product', 'ProductController@save');
Route::post('/update-product/{product_id}', 'ProductController@update');

///CART
Route::prefix('shopping')->group(function(){
	Route::get('/add/{id}','ShoppingCartController@addProduct')->name('add.shopping.cart');
});