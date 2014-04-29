<?php

class Stock extends Eloquent{

	/**
	*
	* Table used by model
	*
	*/
	protected $table = 'stock';

	/*
	*
	* Model primary key
	*
	*/
	protected $primaryKey = 'sku';

	/**
	*
	* we don't need to use timestamp field
	*
	*/
	public $timestamps = false;
}