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

Route::any('{path?}', 'UsersController@index')->where("path", ".+");
Route::post('signUp', 'UsersController@signUp');
Route::post('signIn', 'UsersController@signIn');
Route::get('getCategory', 'CategoriesController@index');
Route::get('showCategory', 'CategoriesController@show');
Route::post('storeCategory', 'CategoriesController@store');
Route::get('updateCategory', 'CategoriesController@update');
