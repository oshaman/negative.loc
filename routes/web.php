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
Route::match(['get', 'post'], 'contacts', ['uses' => 'ContactsController@index', 'as' => 'contacts']);
Route::get('history/{alias?}', ['uses' => 'EventsController@index', 'as' => 'history'])->where('alias', '[\w-]{5,64}');


//news
Route::group(['prefix' => 'news'],function() {

    Route::get('/', 'HomeController@index');
    Route::get('article/{alias?}', ['uses' => 'ArticlesController@index', 'as' => 'articles'])->where('alias', '[\w-]+');
    Route::get('category/{cat_alias?}',['uses'=>'ArticlesController@show','as'=>'cat_alias'])->where('cat_alias','[\w-]{5,20}');
	
	
});
/**
*   Admin Panel
* 
*/
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    
    Route::get('/', ['uses' => 'Admin\IndexController@index', 'as' => 'admin']);
    /**
    *   Admin ARTICLES
    * 
    */
    Route::group(['prefix' => 'articles'], function() {
        //  show articles list
        Route::get('/', ['uses' => 'Admin\ArticlesController@index', 'as' => 'admin_articles']);
        //  (editor uses)show articles list sort by CHECKED, DATE or AUTHOR
        Route::get('sort/{alias}/{param?}', 'Admin\ArticlesController@sorted')->where(['alias' => '[\w-]{5,20}', 'param' => '[\w-]{,20}']);
        
        Route::match(['get', 'post'], 'create', ['uses'=>'Admin\ArticlesController@create', 'as'=>'create_article']);
        Route::match(['get', 'post'], 'edit/{alias}', ['uses'=>'Admin\ArticlesController@edit', 'as'=>'edit_article'])->where('alias', '[\w-]{5,20}');
        Route::match(['get', 'post'], 'del/{alias}', ['uses'=>'Admin\ArticlesController@del', 'as'=>'delete_article'])->where('alias', '[\w-]{5,20}');
        
    });
    Route::get('events', ['uses' => 'Admin\EventsController@index', 'as' => 'admin_events']);
    /**
    *   Admin HISTORY
    * 
    */    
    Route::match(['get', 'post'], 'events', ['uses' => 'Admin\EventsController@index', 'as' => 'admin_events']);
});



Auth::routes();
/**
*   Laravel >= 5.3
*   The Auth::routes method now registers a POST route for /logout instead of a GET route. 
*/
Route::get('/logout', 'Auth\LoginController@logout');
