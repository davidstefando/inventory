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

	/**
	*
	* update application setting
	*
	*/
	public function updateAppSetting(){
		//update organization name setting
		Setting::set('organization_name', Input::get('organization_name'));

		//update organization logo setting
		if (Input::hasFile('organization_logo')) {
			Input::file('organization_logo')->move('public/img', 'organization_name');
			$file_name = 'public/img/organization_name' . Input::file('organization_logo')->getClientOriginalName();
			Setting::set('organization_logo', $file_name);
		}

		return Redirect::to('setting/app');
	}
}