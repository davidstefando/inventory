<?php

class SettingController extends BaseController{

	/**
	*
	* Display app setting form
	*
	*/
	function application(){
		return View::make('settings.app');
	}

	/**
	*
	* Display user setting form
	*
	*/
	function user(){
		return View::make('settings.user');
	}
}