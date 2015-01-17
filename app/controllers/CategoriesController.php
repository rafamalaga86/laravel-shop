<?php

class CategoriesController extends BaseController {
	
	public function __construct(){
		$this->beforeFilter('crsf', ['on' => 'post']);
	}

	public function getIndex(){
		return View::make('categories/index')->with('categories', Category::all());
	}

	public function postCreate(){
		$validator = Validator::make(Input::all(), ['name' => 'required|min:3']);

		if ($validator->passes()){
			$category = new Category;
			$category->name = Input::get('name');
			$category->save();

			return Redirect::to('admin/categories/index')->with('message', 'Category Created');

		} else {

			return Redirect::to('admin/categories/index')->with('message', 'Something went wrong')->withErrors($validator)->withInput();

		}

	}

	public function postDestroy(){

		$category = Category::find(Input::get('id'));

		if (empty($category)){

			return Redirect::to('admin/categories/index')->with('message', 'Something went wrong');

		} else {
			
			$category->delete();
			return Redirect::to('admin/categories/index')->with('message', 'Category Deleted');	

		}

	}
}