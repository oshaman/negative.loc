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
Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);
Route::match(['get', 'post'], '/contacts', ['uses' => 'ContactsController@index', 'as' => 'contacts']);
Route::get('/history/{alias?}', ['uses' => 'EventsController@index', 'as' => 'history'])->where('alias', '[\w-]{5,64}');
Route::get('/articles/{alias?}', ['uses' => 'ArticlesController@index', 'as' => 'articles'])->where('alias', '[\w-]+');
Route::get('articles/category/{cat_alias?}',['uses'=>'ArticlesController@show','as'=>'cat_alias'])->where('cat_alias','[\w-]{5,20}');

Auth::routes();
/**
*   Laravel >= 5.3
*   The Auth::routes method now registers a POST route for /logout instead of a GET route. 
*/
Route::get('/logout', 'Auth\LoginController@logout');
