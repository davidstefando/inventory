<?php
	
class Purchase extends Eloquent {

	public function products()
	{
		return $this->belongsToMany('Product', 'product_purchase', 'purchase_id', 'sku');
	}



}