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
Route::get('history/{alias?}', ['uses' => 'EventsController@index', 'as' => 'history'])->where('alias', '[\w-_]{5,64}');


//news
Route::group(['prefix' => 'news'], function () {

    Route::get('/', 'HomeController@index');
    Route::get('article/{alias?}', ['uses' => 'ArticlesController@index', 'as' => 'articles'])->where('alias', '[\w_-]+');
    Route::get('category/{cat_alias?}',['uses'=>'ArticlesController@show','as'=>'cat_alias'])->where('cat_alias','[\w-]{5,20}');
	
	
});
/**
*   Admin Panel
* 
*/
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    
    Route::get('/', ['uses' => 'Admin\IndexController@index', 'as' => 'admin']);
    /**
    *   Admin USERS
    * 
    */
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['uses' => 'Admin\UsersController@index', 'as' => 'users']);
        Route::match(['get', 'post'], 'edit/{user_id}', ['uses' => 'Admin\UsersController@edit', 'as' =>'user_update'])->where('user_id', '[0-9]+');
        Route::get('del/{user_id}', ['uses'=>'Admin\UsersController@destroy', 'as'=>'delete_user'])->where('user_id', '[0-9]+');
    });
    /**
    *   Admin PERMISSIONS
    * 
    */
    Route::match(['get', 'post'], '/permissions', ['uses' => 'Admin\PermissionsController@index', 'as' => 'admin_permissions']);
    /**
    *   Admin ARTICLES
    * 
    */
    Route::group(['prefix' => 'articles'], function () {
        //  show articles list
        Route::get('/', ['uses' => 'Admin\ArticlesController@index', 'as' => 'admin_articles']);
        //  (editor uses)show articles list sort by CHECKED, DATE or AUTHOR
        Route::get('sort/{alias}/{param?}', 'Admin\ArticlesController@sorted')->where(['alias' => '[\w_-]{,20}', 'param' => '[\w-_]{,255}']);
        
        Route::match(['get', 'post'], 'create', ['uses'=>'Admin\ArticlesController@create', 'as'=>'create_article']);
        Route::match(['get', 'post'], 'edit/{id}', ['uses'=>'Admin\ArticlesController@edit', 'as'=>'edit_article'])->where('id', '[0-9]+');
        Route::get('del/{id}', ['uses'=>'Admin\ArticlesController@del', 'as'=>'delete_article'])->where('id', '[0-9]+');
        
    });
    /**
    *   Admin HISTORY
    * 
    */
    Route::group(['prefix' => 'events'], function () {
        //  show events list
        Route::match(['get', 'post'], '/', ['uses' => 'Admin\EventsController@index', 'as' => 'admin_events']);
        // create, update, delete
        Route::match(['get', 'post'], 'create', ['uses'=>'Admin\EventsController@create', 'as'=>'create_event']);
        Route::match(['get', 'post'], 'edit/{event_id}', ['uses'=>'Admin\EventsController@edit', 'as'=>'edit_event'])->where('event_id', '[0-9]+');
        Route::get('del/{event_id}', ['uses'=>'Admin\EventsController@del', 'as'=>'delete_event'])->where('event_id', '[0-9]+');
    });
});



Auth::routes();
/**
*   Laravel >= 5.3
*   The Auth::routes method now registers a POST route for /logout instead of a GET route. 
*/
Route::get('/logout', 'Auth\LoginController@logout');
