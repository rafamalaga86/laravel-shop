<?php

class UsersController extends BaseController {

	public function getNewaccount(){

		return View::make('users/newaccount');
	}

	public function postCreate(){
		$validate = Validator::make(Input::all(), User::$rules);

		if ($validate->passes()){

			$user = new User;

			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->telephone = Input::get('telephone');

			$user->save();

			return Redirect::to('users/signin')->with('message', 'Thank you for creating a new account. Please sign in.');

		} else {

			return Redirect::back()
				->with('message', 'Something went wrong.')
				->withErrors($validate)
				->withInput();
		}
	}

	public function getSignin() {
		return View::make('users.signin');
	}

	public function postSignin() {
		if ( Auth::attempt( ['email' => Input::get('email'), 'password' => Input::get('password')], false ) ) {

			return Redirect::home()->with('message', 'Thanks for signing in');

		} else {

			return Redirect::back()->with('message', 'The combination of email and password was incorrect');
		}
	}

	public function getSignout() {

		Auth::logout();

		return Redirect::home()->with('message', 'You have been signed out');
	}

}