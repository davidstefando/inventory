<?php
	
class Sell extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sells';

	/**
	*
	* Table primary key
	*
	**/
	protected $primary_key = 'id';

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
	* Defining many to many relationship between Product and Sell
	**/
	public function products()
	{
		return $this->belongsToMany('Product', 'product_sell', 'sell_id', 'sku')->withPivot('qty', 'price', 'total');
	}

	/**
	*
	* Performing product sell
	*
	*/
	public function sellProduct($input){
		//check if product isn't empty
		if (array_key_exists('sku', $input)) {
			$refcode = Sell::getRefCode();

			Sell::create(array('id' => $refcode, 'date' => date('Y-m-d')));
			
			$sell = Sell::find($refcode);

			for($i = 0; $i < count($input['sku']); $i++){
				//validate the input
				if ((is_numeric($input['qty'][$i])) && 
					(is_numeric($input['price'][$i])) &&
					($input['qty'][$i] <= $this->currentStock($input['sku']))) {
					$total = $input['qty'][$i] * $input['price'][$i];

					$sell->products()->attach($input['sku'][$i], 
						array('qty' => $input['qty'][$i], 'price' => $input['price'][$i], 'total' => $total));				

					//updating product price
					$product = Stock::find($input['sku'][$i]);
					$product->sell_price = $input['price'][$i];
					$product->save();
				} else {
					$sell->delete();
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
	* Check product stock before selling, avoid negative stock
	*
	*/
	function currentStock($sku){
		return Product::find("SKU-PROD-11")->stock->stock;
	}

	/**
	*
	* Get new sell reference code 
	*
	*/
	public static function getRefCode(){
		$number = Sell::count() + 1;
		$refcode = "SELL-" . $number;
		return $refcode;
	}

	/**
	*
	* Get combo box contain first to last year of sales
	*
	*/
	public static function getYearTrack(){
		$min = date('Y', strtotime(Sell::all()->min('date')));
		$max = date('Y', strtotime(Sell::all()->max('date')));

		return Form::selectRange('year', $min, $max, null, array('class' => 'form-control'));

	}
}