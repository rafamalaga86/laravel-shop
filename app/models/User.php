<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	protected $fillable = ['firstname', 'lastname', 'email', 'telephone'];

	public static $rules = [

		'firstname' 				=> 'required|alpha',
		'lastname' 					=> 'required|alpha',
		'email' 					=> 'required|email|unique:users',
		'password' 					=> 'required|min:8|confirmed',
		'password_confirmation' 	=> 'required|min:8|',
		'telephone'					=> 'required|min:6',
		'admin'						=> 'integer'
	];


	// protected $fillable = ['firstname'];



}
