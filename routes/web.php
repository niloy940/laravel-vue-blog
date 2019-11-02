<?php

use App\Category;

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
    return view('public.layouts.master');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('{any?}', 'HomeController@index');

Route::get('/categories', 'CategoriesController@index');
Route::post('/categories', 'CategoriesController@store');
Route::delete('/categories/{category}', 'CategoriesController@destroy');
Route::patch('/categories/{category}', 'CategoriesController@update');
Route::get('/categories/{category}', 'CategoriesController@show');

//post
Route::resource('posts', 'PostsController');
