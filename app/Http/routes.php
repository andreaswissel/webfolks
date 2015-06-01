<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('forum', 'ForumController@index');
Route::get('forum/category/{id}', 'CategoryController@index');
Route::get('forum/thread/{id}', 'ThreadController@index');
Route::post('forum/thread/{id}/post/new', 'ThreadController@newAnswer');
Route::get('forum/category/{id}/thread/new', 'ThreadController@displayNewThread');
Route::post('forum/category/{id}/thread/new', 'ThreadController@newThread');

Route::get('user/{id}/profile', 'UsersController@displayProfile');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
