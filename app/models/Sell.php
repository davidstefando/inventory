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
	* Defining many to many relationship between Product and Sell
	**/
	public function products()
	{
		return $this->belongsToMany('Product', 'product_sell', 'sell_id', 'sku')->withPivot('qty', 'price', 'total');
	}

}