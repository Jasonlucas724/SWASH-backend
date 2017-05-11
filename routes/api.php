<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('signUp', 'UsersController@signUp');
Route::post('signIn', 'UsersController@signIn');

Route::get('getCategory', 'CategoriesController@index');
Route::get('showCategory/{id}', 'CategoriesController@show');
Route::post('storeCategory', 'CategoriesController@store');
Route::get('updateCategory/{id}', 'CategoriesController@update');
Route::post('deleteCategory/{id}', 'CategoriesController@delete');

Route::get('getRole', 'RolesController@index');
Route::get('showRole/{id}', 'RolesController@show');
Route::post('storeRole', 'RolesController@store');
Route::get('updateRole/{id}', 'RolesController@update');
Route::post('deleteRole/{id}', 'RolesController@delete');

Route::get('getOrder', 'OrdersController@index');
Route::get('showOrder/{id}', 'OrdersController@show');
Route::post('storeOrder', 'OrdersController@store');
Route::get('Order/{id}', 'OrdersController@update');
Route::post('deleteOrder/{id}', 'OrdersController@delete');

Route::get('getProduct', 'ProductsController@index');
Route::get('showProduct/{id}', 'ProductsController@show');
Route::post('storeProduct', 'ProductsController@store');
Route::get('updateProduct/{id}', 'ProductsController@update');
Route::post('deleteProduct/{id}', 'ProductsController@delete');



Route::any('{path?}', 'MainController@index')->where("path", ".+");
