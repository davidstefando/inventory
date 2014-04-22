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

/*
*
* Authentication process
*
*/

Route::get('login', function(){
	return View::make('login');
});

Route::post('login', function(){
	if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))) {
		return Redirect::intended();
	} else {
		return Redirect::to('login');
	}
});

Route::get('logout', array('as' => 'logout', function(){
	Auth::logout();

	return Redirect::to('login');
}));


/**
*
* filter all pages in this application that require Authentication
*
*/

Route::group(array('before' => 'auth'), function(){

	Route::get('/', function()
	{
		return View::make('index');
	});

	Route::get('product', array('uses' => 'ProductController@showProduct'));
	Route::post('product', array('uses' => 'ProductController@filterProduct'));

	Route::get('product/add', array('uses' => 'ProductController@addProduct'));
	Route::post('product/add', array('uses' => 'ProductController@putProduct'));

	Route::get('sell', array('uses' => 'SellController@index'));
	Route::post('sell', array('uses' => 'SellController@sell'));
	Route::post('sell/add', array('uses' => 'SellController@addProduct'));

	Route::get('purchase', array('uses' => 'PurchaseController@index'));
	Route::post('purchase', array('uses' => 'PurchaseController@purchase'));
	Route::post('purchase/add', array('uses' => 'PurchaseController@addProduct'));

});
