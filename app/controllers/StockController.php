<?php

	class StockController extends BaseController{

		/**
		*
		* Displaying product stock check view
		*
		*/
		public function checkStock(){
			return View::make('checkstock');
		}

		/**
		*
		* Displaying product stock
		*
		*/
		public function showStock(){
			$product = Product::where('sku', '=', Input::get('sku'))
						->has('stock')
						->has('category')
						->first();
			return View::make('checkstock', compact('product'));
		}
	}