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

Route::group(['namespace' => 'Web'], function () {
	Route::get('/', 'IndexController@index');
	Route::get('newGame', 'IndexController@newGame');
	Route::get('hotGame', 'IndexController@hotGame');
});


Route::group(['namespace' => 'Web\Game'], function () {
	Route::get('game/category', 'CategoryController@index');
	Route::get('game/detail/{id}', 'DetailController@index');
});

Route::group(['namespace' => 'Web\Article'], function () {
	Route::get('article', 'IndexController@index');
});
