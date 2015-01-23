<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::when('*', 'csrf', ['post', 'put', 'delete']);

Route::get('/', ['as' => 'home', 'uses' => 'StoreController@getIndex']);

Route::controller('users', 'UsersController');


// Route::group(['before' => 'auth', 'only' => ], function(){



// });

Route::controller('store', 'StoreController');



Route::group(['before' => 'admin'], function(){

	Route::controller('admin/categories', 'CategoriesController');

	Route::controller('admin/products', 'ProductsController');


});


