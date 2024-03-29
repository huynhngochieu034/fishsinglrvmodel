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
Route::get('/introduce','HomeController@introduce');
Route::get('/guide','HomeController@guide');

Route::get('/phongbenh','HomeController@phongbenh');
Route::get('/phongbenhnam','HomeController@phongbenhnam');

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

//add to cart
Route::match(['get','post'], '/add-cart','ProductController@addtocart');
//Route::post('/add-cart', 'ProductController@addtocart');

//cart page
Route::match(['get','post'], '/cart','ProductController@cart');

//delete product from cart page
Route::get('/cart/delete-product/{id}','ProductController@deleteCartProduct');

//update product quality in cart
Route::get('/cart/update-quality/{id}/{quality}','ProductController@updateCartQuality');

//Register/Login
Route::get('/login-register','UserController@userLoginRegister');

Route::post('/user-register','UserController@register');

Route::get('/user-logout','UserController@logout');

Route::post('/user-login','UserController@login');

//check out
Route::get('/all-cart', 'ProductController@allCart');

//update cart status
Route::get('/update-cart-status','ProductController@updateCartStatus');

//update account
//Route::match(['get','post'], '/account','UserController@account');

Route::group(['middleware'=>['frontlogin']],function(){
	Route::match(['get','post'], '/account','UserController@account');
	//Check current userpass
	Route::post('/check-user-pwd','UserController@chkUserPassword');

	Route::post('/update-user-pwd','UserController@updatePassword');

	Route::get('/history','UserController@history');
});

Route::get('/all-cartv', 'CartController@allCart');

Route::get('/unactive-cart/{id}', 'CartController@unactiveCart');
Route::get('/active-cart/{id}', 'CartController@activeCart');

Route::get('/delete-cart/{id}', 'CartController@deleteCart');

Route::get('/cart/quality/{id}/{quality}','CartController@cartQuality');