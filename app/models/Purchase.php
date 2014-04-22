<?php
	
class Purchase extends Eloquent {
	/**
	*
	* Ignore timestamps field
	*
	*/
	public $timestamps = false;

	/**
	*
	* Allowed field in mass assignment
	*
	*/
	protected $fillable = array('id', 'date');

	/**
	*
	* Defining many to many relationship between Product and purchase
	**/
	public function products()
	{
		return $this->belongsToMany('Product', 'product_purchase', 'purchase_id', 'sku')->withPivot('qty', 'price', 'total');
	}

	/**
	*
	* Performing product purchase
	*
	*/
	public function purchaseProduct($input){
		//check if product isn't empty
		if (array_key_exists('sku', $input)) {
			$refcode = Purchase::getRefCode();

			Purchase::create(array('id' => $refcode, 'date' => date('Y-m-d')));
			
			$purchase = Purchase::find($refcode);

			

			for($i = 0; $i < count($input['sku']); $i++){
				if ((is_numeric($input['qty'][$i])) && (is_numeric($input['price'][$i]))) {
					$total = $input['qty'][$i] * $input['price'][$i];

					$purchase->products()->attach($input['sku'][$i], 
						array('qty' => $input['qty'][$i], 'price' => $input['price'][$i], 'total' => $total));				

					//updating product price
					$product = Stock::find($input['sku'][$i]);
					$product->buy_price = $input['price'][$i];
					$product->save();
				} else {
					$purchase->delete();
					return false;
				}
			}
		} else {
			return false;
		}
		return true;
	}

	/**
	*
	* Get new purchase reference code 
	*
	*/
	public static function getRefCode(){
		$number = Purchase::count() + 1;
		$refcode = "PURCHASE-" . $number;
		return $refcode;
	}
}