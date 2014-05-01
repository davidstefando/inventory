<?php
class Setting extends Eloquent{

	/**
	*
	* model primary key
	*
	*/
	protected $primaryKey = "name";

	/**
	*
	* we don't need to use timestamps in setting table
	*
	*/
	public $timestamps = false;

	/**
	*
	* get a setting value from a given name
	*
	*/
	public static function get($name){
		$setting = Setting::where('name', '=', $name)->first();

		if ($setting != null) {
			return $setting->value;
		}

		return null;
	}

	/**
	*
	* set a setting value
	*
	*/
	public static function set($name, $value){
		$setting = Setting::find($name);
		$setting->value = $value;
		$setting->save();
	}
}