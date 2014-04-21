<?php

class Stock extends Eloquent{

	/**
	*
	* Table used by model
	*
	*/
	protected $table = 'stock';

	/**
	*
	* we don't need to use timestamp field
	*
	*/
	public $timestamps = false;
}