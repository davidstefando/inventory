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

	Route::get('/', array('uses' => 'HomeController@dashboard'));

	Route::get('product', array('uses' => 'ProductController@showProduct'));
	Route::post('product', array('uses' => 'ProductController@filterProduct'));

	Route::get('product/add', array('uses' => 'ProductController@addProduct'));
	Route::post('product/add', array('uses' => 'ProductController@putProduct'));

	Route::get('product/update/{sku}', array('uses' => 'ProductController@updateProduct'));
	Route::post('product/update/{sku}', array('uses' => 'ProductController@editProduct'));

	Route::post('product/autocomplete', array('uses' => 'ProductController@autocomplete'));	

	Route::get('sell', array('uses' => 'SellController@index'));
	Route::post('sell', array('uses' => 'SellController@sell'));
	Route::post('sell/add', array('uses' => 'SellController@addProduct'));
	Route::get('sell/report', array('uses' => 'ReportController@sellReport'));
	Route::post('sell/report/daily', array('uses' => 'ReportController@dailySellReport'));
	Route::post('sell/report/monthly', array('uses' => 'ReportController@monthlySellReport'));
	Route::post('sell/report/year', array('uses' => 'ReportController@yearSellReport'));

	Route::get('purchase', array('uses' => 'PurchaseController@index'));
	Route::post('purchase', array('uses' => 'PurchaseController@purchase'));
	Route::post('purchase/add', array('uses' => 'PurchaseController@addProduct'));
	Route::get('purchase/report', array('uses' => 'ReportController@purchaseReport'));
	Route::post('purchase/report/daily', array('uses' => 'ReportController@dailypurchaseReport'));
	Route::post('purchase/report/monthly', array('uses' => 'ReportController@monthlypurchaseReport'));
	Route::post('purchase/report/year', array('uses' => 'ReportController@yearpurchaseReport'));

	Route::get('stock/check', array('uses' => 'StockController@checkStock'));
	Route::post('stock/check', array('uses' => 'StockController@showStock'));

	Route::resource('category', 'CategoryController');
	Route::resource('unit', 'UnitController');
	Route::resource('supplier', 'SupplierController');
	Route::resource('location', 'LocationController');


});