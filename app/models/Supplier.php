<?php

class Supplier extends Eloquent{
	/**
	*
	* Validation rules
	*
	*/
	protected $rules = array(
			'name' => 'required'
		);

	/**
	*
	* Validation error messages
	*
	**/
	public static $error;

	/**
	*
	* Ignore timestamps
	*
	*/
	public $timestamps = false;


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