<?php

	class SellController extends BaseController{

		protected function index(){
			return View::make('sells.index');
		}

		/**
		* Performing product sell
		*
	  	**/
		protected function sell(){
			$sell = new Sell;
			if ($sell->sellProduct(Input::except('_token'))) {
				return Redirect::to('sell')->with('message', 'success');	
			} else {
				return Redirect::to('sell')->with('message', 'failed');
			}
			
		}

		/**
		*
		* Adding temporary product to sell
		*
		*/
		protected function addProduct(){
			if(Request::ajax()){
				$product = Product::find(Input::get('sku'));
				
				$return = "<tr id='$product->sku'>
								<td><input type='hidden' name='sku[]' value=" . $product->sku . "></input>" . $product->sku . "</td>
								<td>". $product->name . "</td>
								<td>" . $product->stock->stock . "</td>
								<td class='col-md-2'>
									<div class='input-group'>
                                        <input class='form-control' type='text' name='qty[]' value=" . Input::get('qty') . " required>
                                        <div class='input-group-addon'>Unit</div>
                                    </div>
                                </td>
                                <td class='col-md-1'>Rp" . number_format($product->stock->sell_price, 2, ',', '.') . "</td>
                                <td class='col-md-2'>
									<div class='input-group'>
										<div class='input-group-addon'>Rp</div>
                                        <input class='form-control' id='exampleInputEmail1' placeholder='Harga Jual' type='text' name='price[]' value=". $product->stock->sell_price . " required>
                                    </div>	
                                </td> 
                                <td class='col-md-1'><a onclick=remove_product('$product->sku') class='btn btn-danger'><i class='fa fa-trash-o'></i>Hapus</a></td>
							</tr>";
				return $return;
			}
		}
	}