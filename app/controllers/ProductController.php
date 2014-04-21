<?php

	class ProductController extends BaseController{

		/**
		* Showing product lists
		*
		*/
		protected function showProduct(){
			$products = Product::has('stock')
				->has('category')
				->has('location')
				->has('unit')
				->paginate(10);
			return View::make('products.list', compact('products'));
		}


		/**
		*
		* Displaying add product form
		*
		*/ 
		protected function addProduct(){
			$category = Category::all()->lists('name', 'id');
			$location = Location::all()->lists('name', 'id');
			$unit = Unit::all()->lists('name', 'id');

			return View::make('products.add')
				->with(compact('category'))
				->with(compact('unit'))
				->with(compact('location'));
		}

		/**
		* Add product to database
		*
		*/
		protected function putProduct(){
			$product = new Product(Input::all());

			if($product->validate(Input::all())){
				/*Creating initial stock*/
				$stock = new Stock();

				$stock->sku = Input::get('sku');
				$stock->stock = Input::get('stock');
				$stock->buy_price = Input::get('buy_price');
				$stock->sell_price = Input::get('sell_price');
				$stock->date = date('Y-m-d');

				/*Saving product and initial stock*/
				$stock->save();
				$product->save();

				return Redirect::to('product/add')->with('message', 'success');
			}else{
				return Redirect::to('product/add')->withErrors($model->error)->withInput();
			}

		}


	}