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
		$users = User::get(array('id' ,'username', 'email', 'created_at'));
		return View::make('settings.user.user', compact('users'));
	}

	/**
	*
	* display new user form
	*
	*/
	function addUser(){
		return View::make('settings.user.add');
	}

	/**
	*
	* display user password change form
	*
	*/
	function userPassword(){
		return View::make('settings.user.password');
	}

	/**
	*
	* registering new user
	*
	*/
	function registerUser(){
		$user = new User;
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->save();

		return Redirect::to('setting/user');
	}

	/**
	*
	* deleting user
	*
	*/
	function deleteUser($id){
		$user = User::find($id);

		$user->delete();

		return Redirect::to('setting/user');
	}

	/**
	*
	* editing user password in the database
	*
	*/
	function editUserPassword(){
		$user_id = Auth::user()->id;
		$user_password = Auth::user()->password;
		$old_password = Input::get('old_password');
		$new_password = Hash::make(Input::get('new_password'));

		if (Auth::validate(array('id' => $user_id, 'password' => $old_password))) {
			$user = User::find($user_id);
			$user->password = $new_password;
			$user->save();
			return Redirect::to('setting/user');
		}
		return Redirect::to('setting/user/password');
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
			Input::file('organization_logo')->move('public/img', 'organization_logo' . '.' . Input::file('organization_logo')->getClientOriginalExtension());
			$file_name = 'public/img/organization_logo' . '.' . Input::file('organization_logo')->getClientOriginalExtension();
			Setting::set('organization_logo', $file_name);
		}

		return Redirect::to('setting/app');
	}
}