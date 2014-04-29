<?php
	
class PurchaseController extends BaseController{
		protected function index(){
			$suppliers = Supplier::all()->lists('name', 'id');
			return View::make('purchases.index')
							->with(compact('suppliers'));
		}

		/**
		* Performing product sell
		*
	  	**/
		protected function purchase(){
			$purchase = new Purchase;
			if ($purchase->purchaseProduct(Input::except('_token'))) {
				return Redirect::to('purchase')->with('message', 'success');	
			} else {
				return Redirect::to('purchase')->with('message', 'failed');
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
								<input type='hidden' name='supplier' value=" . Input::get('supplier') . "
								<td><input type='hidden' name='sku[]' value=" . $product->sku . "></input>" . $product->sku . "</td>
								<td>". $product->name . "</td>
								<td class='col-md-2'>
									<div class='input-group'>
                                        <input class='form-control' type='text' name='qty[]' value=" . Input::get('qty') . " required>
                                        <div class='input-group-addon'>Unit</div>
                                    </div>
                                </td>
                                <td class='col-md-1'>Rp" . number_format($product->stock->buy_price, 2, ',', '.') . "</td>
                                <td class='col-md-2'>
									<div class='input-group'>
										<div class='input-group-addon'>Rp</div>
                                        <input class='form-control' placeholder='Harga Beli' type='text' name='price[]' value=". $product->stock->buy_price . " required>
                                    </div>	
                                </td> 
                                <td class='col-md-1'><a onclick=remove_product('$product->sku') class='btn btn-danger'><i class='fa fa-trash-o'></i>Hapus</a></td>
							</tr>";
				return $return;
			}
		}	
}