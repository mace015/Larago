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

// Unrestricted routes.
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));
Route::get('/snippet/{id}', array('as' => 'snippet', 'uses' => 'SnippetController@getSnippet'));
Route::get('/snippets', array('as' => 'snippets', 'uses' => 'SnippetController@getSnippets'));

// Implicit controller
Route::controller('ajaxController', 'AjaxController');

// Routes user must be a guest for.
Route::group(array('middleware' => 'guest'), function(){

	Route::get('/login', array('as' => 'login', 'uses' => 'UserController@getLogin'));
	Route::post('/login', array('uses' => 'UserController@postLogin'));

	Route::get('/register', array('as' => 'register', 'uses' => 'UserController@getRegister'));
	Route::post('/register', array('uses' => 'UserController@postRegister'));

	Route::get('/activate/{hash}', array('as' => 'activate', 'uses' => 'UserController@getActivation'));

});

// Routes user needs to be logged in for.
Route::group(array('middleware' => 'auth'), function(){

	Route::get('/me', array('as' => 'me', 'uses' => 'UserController@getMe'));
	Route::post('/me', array('uses' => 'UserController@postMe'));

	Route::get('/addsnippet', array('as' => 'addsnippet', 'uses' => 'SnippetController@getAddSnippet'));
	Route::post('/addsnippet', array('uses' => 'SnippetController@postAddSnippet'));

	Route::get('/editsnippet/{id}', array('as' => 'editsnippet', 'uses' => 'SnippetController@getEditSnippet'));
	Route::post('/editsnippet/{id}', array('uses' => 'SnippetController@postEditSnippet'));

	Route::get('/mysnippets', array('as' => 'mysnippets', 'uses' => 'SnippetController@getMySnippets'));

	Route::post('/snippet/comment/{id}', array('as' => 'comment', 'uses' => 'SnippetController@addComment'));

	Route::get('/logout', array('as' => 'logout', 'uses' => 'UserController@logout'));

});
