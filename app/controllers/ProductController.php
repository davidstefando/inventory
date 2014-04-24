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
				->paginate(15);
			return View::make('products.list', compact('products'));
		}

		/**
		*
		* Filter the product lists
		*
		*/
		protected function filterProduct(){
			if ((Input::get('criteria') == "name") || (Input::get('criteria') == "sku")) {

				$products = Product::where(Input::get('criteria'), 'like', '%' . Input::get('query') . '%')
					->has('category')
					->has('location')
					->has('unit')
					->has('stock')
					->orderBy(Input::get('criteria'), Input::get('order'))
					->paginate(0);

			} elseif (Input::get('criteria') == "category") {

				$products = Product::whereHas('category', function($q){
					$q->where('name', 'like', '%' . Input::get('query') . '%');	
				})
				->has('location')
				->has('unit')
				->has('stock')
				->paginate(0);

			} else {

				$products = Product::whereHas('location', function($q){
					$q->where('name', 'like', '%' . Input::get('query') . '%');	
				})
				->has('category')
				->has('unit')
				->has('stock')
				->paginate(0);

			}

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
				/*Saving product*/
				$product->save();

				/*Creating initial stock*/
				$stock = new Stock();

				$stock->sku = Input::get('sku');
				$stock->stock = Input::get('stock');
				$stock->buy_price = Input::get('buy_price');
				$stock->sell_price = Input::get('sell_price');
				$stock->date = date('Y-m-d');

				/*Saving initial stock*/
				$stock->save();
				

				return Redirect::to('product/add')->with('message', 'success');
			}else{
				return Redirect::to('product/add')->withErrors($model->error)->withInput();
			}

		}

		/**
		*
		* Showing product update form
		*
		*/
		public function updateProduct($sku){
			$category = Category::all()->lists('name', 'id');
			$location = Location::all()->lists('name', 'id');
			$unit = Unit::all()->lists('name', 'id');

			$model = Product::find($sku);

			return View::make('products.update')
					->with(compact('category'))
					->with(compact('unit'))
					->with(compact('location'))
					->with(compact('model'));
		}

		/**
		*
		* Eding product in database
		*
		*/
		function editProduct($sku){
			$product = Product::find($sku);

			if($product->validateEdit(Input::all())){

				$product->sku = Input::get('sku');
				$product->name = Input::get('name');
				$product->category_id = Input::get('category_id');
				$product->location_id = Input::get('location_id');	
				$product->unit_id = Input::get('unit_id');	
				$product->minimum_stock = Input::get('minimum_stock');	
				
				$product->save();				

				return Redirect::to('product/update/' . Input::get('sku'))->with('message', 'success');
			}else{
				return Redirect::to('product/update/' . $sku)->withErrors($product->error)->withInput();
			}
		}

	}