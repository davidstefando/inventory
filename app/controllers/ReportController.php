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
			$product_list = $products->groupBy('sells.date', 'product_sell.sku', 'product_sell.price')
									 ->get(array(
											'product_sell.sku',
											'name',
											'sells.date',
											'buy_price',
											DB::raw('product_sell.price as sell_price'),
											DB::raw('sum(qty) as qty'),
											DB::raw('sum(total) as total')
										));

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
			$product_list = $products->groupBy('sells.date', 'product_sell.sku', 'product_sell.price')
									 ->get(array(
											'product_sell.sku',
											'name',
											'sells.date',
											'buy_price',
											DB::raw('product_sell.price as sell_price'),
											DB::raw('sum(qty) as qty'),
											DB::raw('sum(total) as total')
										));

			$month = DateTime::createFromFormat('!m', Input::get('month'));
			$report_date = $month->format('F') . " " . Input::get('year');

			return View::make('report.sell')
					->nest('child', 'report.sell.monthly', 
						array('total_qty' => $total_qty, 
								'total_sell' => $total_sell,
								'product_list' => $product_list,
								'month' => $report_date));
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
			$product_list = $products->groupBy('sells.date', 'product_sell.sku', 'product_sell.price')
									 ->get(array(
											'product_sell.sku',
											'name',
											'sells.date',
											'buy_price',
											DB::raw('product_sell.price as sell_price'),
											DB::raw('sum(qty) as qty'),
											DB::raw('sum(total) as total')
										));


			return View::make('report.sell')
					->nest('child', 'report.sell.year', 
						array('total_qty' => $total_qty, 
								'total_sell' => $total_sell,
								'product_list' => $product_list,
								'year' => Input::get('year')));
		}


		/**
		*
		* Display purchase report form view, to select what report will be displayed
		*
		*/
		public function purchaseReport(){
			return View::make('report.purchase', array('child' => ''));
		}

		/**
		*
		* Display report of purchasing on daily basis
		*
		*/
		public function dailyPurchaseReport(){

			//if user want to display purchase from a product only
			if(Input::get('sku')){
				$criteria = '=';
				$sku = Input::get('sku');
			} else {
				$criteria = 'like';
				$sku = '%' . Input::get('sku') . '%';
			}

			$products = DB::table('product_purchase')
							->join('purchases', 'product_purchase.purchase_id', '=', 'purchases.id')
							->join('products', 'product_purchase.sku', '=', 'products.sku')
							->join('stock', 'product_purchase.sku', '=', 'stock.sku')
							->where('purchases.date', '=', Input::get('date'))
							->where('product_purchase.sku', $criteria	, $sku)
							->orderBy(Input::get('criteria'), Input::get('order'));

			$total_qty = $products->sum('qty');
			$total_purchase = $products->sum('total');
			$product_list = $products->groupBy('purchases.date', 'product_purchase.sku', 'product_purchase.price')
									 ->get(array(
											'product_purchase.sku',
											'name',
											'purchases.date',
											'buy_price',
											DB::raw('product_purchase.price as sell_price'),
											DB::raw('sum(qty) as qty'),
											DB::raw('sum(total) as total')
										));

			return View::make('report.purchase')
					->nest('child', 'report.purchase.daily', 
						array('total_qty' => $total_qty, 
								'total_purchase' => $total_purchase,
								'product_list' => $product_list,
								'date' => Input::get('date')));
			
		}

		/**
		*
		* Display report of purchase per month
		*
		*/
		public function monthlyPurchaseReport(){
			//if user want to display purchase from a product only
			if(Input::get('sku')){
				$criteria = '=';
				$sku = Input::get('sku');
			} else {
				$criteria = 'like';
				$sku = '%' . Input::get('sku') . '%';
			}

			$begin = Input::get('year') . "-" . Input::get('month') . "-01 00:00:00";
			$end = Input::get('year') . "-" . Input::get('month') . "-31 00:00:00";


			$products = DB::table('product_purchase')
							->join('purchases', 'product_purchase.purchase_id', '=', 'purchases.id')
							->join('products', 'product_purchase.sku', '=', 'products.sku')
							->join('stock', 'product_purchase.sku', '=', 'stock.sku')
							->whereBetween('purchases.date', array($begin , $end))
							->where('product_purchase.sku', $criteria	, $sku)
							->orderBy(Input::get('criteria'), Input::get('order'));

			$total_qty = $products->sum('qty');
			$total_purchase = $products->sum('total');
			$product_list = $products->groupBy('purchases.date', 'product_purchase.sku', 'product_purchase.price')
									 ->get(array(
											'product_purchase.sku',
											'name',
											'purchases.date',
											'buy_price',
											DB::raw('product_purchase.price as sell_price'),
											DB::raw('sum(qty) as qty'),
											DB::raw('sum(total) as total')
										));

			$month = DateTime::createFromFormat('!m', Input::get('month'));
			$report_date = $month->format('F') . " " . Input::get('year');

			return View::make('report.purchase')
					->nest('child', 'report.purchase.monthly', 
						array('total_qty' => $total_qty, 
								'total_purchase' => $total_purchase,
								'product_list' => $product_list,
								'month' => $report_date));
		}

		/**
		*
		* Display report of purchase per year
		*
		*/
		public function yearPurchaseReport(){
			//if user want to display purchase from a product only
			if(Input::get('sku')){
				$criteria = '=';
				$sku = Input::get('sku');
			} else {
				$criteria = 'like';
				$sku = '%' . Input::get('sku') . '%';
			}


			$begin = Input::get('year') . "-01-01 00:00:00";
			$end = Input::get('year') . "-12-31 00:00:00";

			$products = DB::table('product_purchase')
							->join('purchases', 'product_purchase.purchase_id', '=', 'purchases.id')
							->join('products', 'product_purchase.sku', '=', 'products.sku')
							->join('stock', 'product_purchase.sku', '=', 'stock.sku')
							->whereBetween('purchases.date', array($begin , $end))
							->where('product_purchase.sku', $criteria	, $sku)
							->orderBy(Input::get('criteria'), Input::get('order'));

			$total_qty = $products->sum('qty');
			$total_purchase = $products->sum('total');
			$product_list = $products->groupBy('purchases.date', 'product_purchase.sku', 'product_purchase.price')
									 ->get(array(
											'product_purchase.sku',
											'name',
											'purchases.date',
											'buy_price',
											DB::raw('product_purchase.price as sell_price'),
											DB::raw('sum(qty) as qty'),
											DB::raw('sum(total) as total')
										));

			return View::make('report.purchase')
					->nest('child', 'report.purchase.year', 
						array('total_qty' => $total_qty, 
								'total_purchase' => $total_purchase,
								'product_list' => $product_list,
								'year' => Input::get('year')));
		}
	}