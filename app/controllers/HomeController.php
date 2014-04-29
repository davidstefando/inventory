<?php

class HomeController extends BaseController {

	public function dashboard(){

		$alert = Product::alertProduct();
		
		return View::make('index')
						->with(array('alert' => $alert));
	}

	private function sellStatistic(){
		return DB::table('sells')
			->join('product_sell', 'sells.id', '=', 'product_sell.sell_id')
			->groupBy('date')
			->get(array(
					DB::raw('sum(qty) as total')
				));
	}



}