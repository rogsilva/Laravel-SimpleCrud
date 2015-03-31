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

/**
 * Rota para a página principal
 */
Route::get('/', function()
{
	return View::make('hello');
});

/**
 * Rota de Login
 */
Route::get('login', function()
{
    return View::make('login');
});


/**
 * Grupo de Rotas para a área administrativa
 */
Route::group(array('prefix'=>'admin', 'before'=> null), function()
{
    Route::get('/', array('uses' => 'UsersController@getIndex'));
    
    Route::controller('users','UsersController');
    Route::controller('products','ProductsController');
    
});
