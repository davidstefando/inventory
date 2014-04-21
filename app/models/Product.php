<?php
	
class Product extends Eloquent {

	/**
	 * Table primary key
	 *
	 * @var string
	 */
	protected $primaryKey = 'sku';


	/**
	*
	* Validation rules
	*
	**/
	protected $rules = array(
			'sku' => 'required',
			'name' => 'required',
			'category_id' => 'required',
			'location_id' => 'required',
			'unit_id' => 'required',
			'stock' => 'required|min:0|numeric',
			'minimum_stock' => 'required|min:0|numeric',
			'buy_price' => 'required|min:0|numeric',
			'sell_price' => 'required|min:0|numeric'
		);

	/**
	*
	* Validation error messages
	*
	**/
	public static $error;


	/**
	*
	* Mass assignment exception
	*
	*/
	protected $guarded = array('_token', 'stock', 'buy_price', 'sell_price');

	/**
	*
	* Defining many to many relationship between Product and Sell
	**/
	public function sells()
	{
		return $this->belongsToMany('Sell', 'product_sell', 'sku', 'sell_id')->withPivot('qty', 'price', 'total');
	}

	/**
	*
	* Defining one to one relationship between Product and Stock
	**/
	public function stock()
	{
		return $this->hasOne('Stock', 'sku');
	}

	/**
	* validating data before saving to database
	*
	* @param data to validate
	* @return validation status
	* */
	public function validate($data){
		$validator = Validator::make($data, $this->rules);

		if($validator->passes()){
			return true;
		}

		$this->error = $validator->messages();
		return false;
	}


}