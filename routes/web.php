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
Route::get('/history', ['uses' => 'EventsController@index', 'as' => 'history']);
Auth::routes();

/**
*   Laravel >= 5.3
*   The Auth::routes method now registers a POST route for /logout instead of a GET route. 
*/
Route::get('/logout', 'Auth\LoginController@logout');
