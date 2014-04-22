<?php
	
	class ReportController extends BaseController{
		

		/**
		*
		* Display sell report form view, to select what report will be displayed
		*
		*/
		public function sellReport(){
			return View::make('report.sell', array('child' => ''));
		}

		/**
		*
		* Display report of selling on daily basis
		*
		*/
		public function dailySellReport(){

			//if user want to display sell from a product only
			if(Input::get('sku')){
				$criteria = '=';
				$sku = Input::get('sku');
			} else {
				$criteria = 'like';
				$sku = '%' . Input::get('sku') . '%';
			}

			$products = DB::table('product_sell')
							->join('sells', 'product_sell.sell_id', '=', 'sells.id')
							->join('products', 'product_sell.sku', '=', 'products.sku')
							->join('stock', 'product_sell.sku', '=', 'stock.sku')
							->where('sells.date', '=', Input::get('date'))
							->where('product_sell.sku', $criteria	, $sku)
							->orderBy(Input::get('criteria'), Input::get('order'));

			$total_qty = $products->sum('qty');
			$total_sell = $products->sum('total');
			$product_list = $products->get();

			return View::make('report.sell')
					->nest('child', 'report.sell.daily', 
						array('total_qty' => $total_qty, 
								'total_sell' => $total_sell,
								'product_list' => $product_list,
								'date' => Input::get('date')));
			
		}

		/**
		*
		* Display report of selling per month
		*
		*/
		public function monthlySellReport(){
			//if user want to display sell from a product only
			if(Input::get('sku')){
				$criteria = '=';
				$sku = Input::get('sku');
			} else {
				$criteria = 'like';
				$sku = '%' . Input::get('sku') . '%';
			}

			$begin = Input::get('year') . "-" . Input::get('month') . "-01 00:00:00";
			$end = Input::get('year') . "-" . Input::get('month') . "-31 00:00:00";


			$products = DB::table('product_sell')
							->join('sells', 'product_sell.sell_id', '=', 'sells.id')
							->join('products', 'product_sell.sku', '=', 'products.sku')
							->join('stock', 'product_sell.sku', '=', 'stock.sku')
							->whereBetween('sells.date', array($begin , $end))
							->where('product_sell.sku', $criteria	, $sku)
							->orderBy(Input::get('criteria'), Input::get('order'));

			$total_qty = $products->sum('qty');
			$total_sell = $products->sum('total');
			$product_list = $products->get();

			return View::make('report.sell')
					->nest('child', 'report.sell.monthly', 
						array('total_qty' => $total_qty, 
								'total_sell' => $total_sell,
								'product_list' => $product_list,
								'month' => Input::get('month')));
		}

		/**
		*
		* Display report of selling per year
		*
		*/
		public function yearSellReport(){
			//if user want to display sell from a product only
			if(Input::get('sku')){
				$criteria = '=';
				$sku = Input::get('sku');
			} else {
				$criteria = 'like';
				$sku = '%' . Input::get('sku') . '%';
			}


			$begin = Input::get('year') . "-01-01 00:00:00";
			$end = Input::get('year') . "-12-31 00:00:00";

			$products = DB::table('product_sell')
							->join('sells', 'product_sell.sell_id', '=', 'sells.id')
							->join('products', 'product_sell.sku', '=', 'products.sku')
							->join('stock', 'product_sell.sku', '=', 'stock.sku')
							->whereBetween('sells.date', array($begin , $end))
							->where('product_sell.sku', $criteria	, $sku)
							->orderBy(Input::get('criteria'), Input::get('order'));

			$total_qty = $products->sum('qty');
			$total_sell = $products->sum('total');
			$product_list = $products->get();

			return View::make('report.sell')
					->nest('child', 'report.sell.year', 
						array('total_qty' => $total_qty, 
								'total_sell' => $total_sell,
								'product_list' => $product_list,
								'year' => Input::get('year')));
		}
	}