<?php

class UsersTableSeeder extends Seeder {

	public function run() {
		$user = new User;
		$user->firstname = 'admin';
		$user->lastname = 'admin';
		$user->email = 'admin@admin.com';
		$user->password = Hash::make('admin');
		$user->telephone = '648924583';
		$user->admin = 1;
		$user->save();

	}
}