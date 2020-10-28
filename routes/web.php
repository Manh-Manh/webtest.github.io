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
//Frontend
Route::get('/','HomeController@index' );
Route::get('/Home','HomeController@index2')->name('Home');
Route::post('/Home','HomeController@index2')->name('search');
Route::get('/show_category/{category_ID}','HomeController@show_category');
Route::get('/show_supplier/{supplire_ID}','HomeController@show_supplier');
Route::get('/detail/{product_ID}','HomeController@detail');

//Backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');

Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/logout','AdminController@logoutdashboard');

//Category Product
Route::get('/add_category_product','CategoryController@add_category_product');
Route::get('/all_category_product','CategoryController@all_category_product');

Route::get('/edit-category-product/{category_product_id}','CategoryController@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryController@delete_category_product');

Route::post('/save_category_product','CategoryController@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryController@update_category_product');

	//SupplierController Product
Route::get('/add_supplier','SupplierController@add_supplier');
Route::get('/all_supplier','SupplierController@all_supplier');

Route::get('/edit-supplier/{supplier_id}','SupplierController@edit_supplier');
Route::get('/delete-supplier/{supplier_id}','SupplierController@delete_supplier');

Route::post('/save_supplier','SupplierController@save_supplier');
Route::post('/update-supplier/{supplier_id}','SupplierController@update_supplier');
 //Product
Route::get('/add_product','ProductController@add_product');
Route::get('/all_product','ProductController@all_product');

Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');

Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');

Route::post('/save_product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
