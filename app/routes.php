<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => 'api/v1'), function()
{

	Route::get('category',[
		'as' => 'api_show_all_category',
		'uses' => 'CategoryController@index'
	]);
	Route::get('category/{id}',[
		'as' => 'api_show_category',
		'uses' => 'CategoryController@show'
	]);

	Route::get('user',[
		'as' => 'api_show_all_user',
		'uses' => 'UserController@index'
	]);
	Route::get('user/{id}',[
		'as' => 'api_show_user',
		'uses' => 'UserController@show'
	]);

	Route::get('book',[
		'as' => 'api_show_all_book',
		'uses' => 'BookController@index'
	]);
	Route::get('book/{id}',[
		'as' => 'api_show_book',
		'uses' => 'BookController@show'
	]);

	Route::get('author',[
		'as' => 'api_show_all_author',
		'uses' => 'AuthorController@index'
	]);
	Route::get('author/{id}',[
		'as' => 'api_show_author',
		'uses' => 'AuthorController@show'
	]);

});