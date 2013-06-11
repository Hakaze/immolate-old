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

Route::get('/', function(){
	return View::make('app');
});
Route::post('/account/login', array('before' => 'csrf_json', 'uses' => 'AccountController@postLogin'));
Route::get('/account/logout', 'AccountController@getLogout');
Route::controller('account','AccountController');
Route::resource('soulbinder', 'SoulbindersController');
Route::get('/soulbinder/{soulbinder}/updates', 'UpdatesController@index');
Route::post('/soulbinder/{soulbinder}/updates', 'UpdatesController@confirm');
Route::get('/soulbinder/{soulbinder}/giftbox', 'GiftboxController@index');
Route::post('/soulbinder/{soulbinder}/giftbox', 'GiftboxController@accept');
Route::get('/soulbinder/{soulbinder}/shop', 'ShopController@index');
Route::post('/soulbinder/{soulbinder}/shop', 'ShopController@purchase');

