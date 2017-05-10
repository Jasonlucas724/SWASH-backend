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

Route::any('{path?}', 'MainController@index')->where("path", ".+");
Route::post('signUp', 'UsersController@signUp');
Route::post('signIn', 'UsersController@signIn');
Route::any('{path?}', 'UsersController@index')->where("path", ".+");
Route::get('categories', 'CategoriesController@index');
Route::get('categories', 'CategoriesController@show');
Route::post('categories', 'CategoriesController@store');
Route::get('categories', 'CategoriesController@update');
