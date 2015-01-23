<?php

class CategoriesController extends BaseController {

	public function getIndex(){
		
		return View::make('categories/index')->with('categories', Category::all());
	}

	public function postCreate(){
		$validator = Validator::make(Input::all(), Category::$rules);

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

		if ( empty($category) ){

			return Redirect::to('admin/categories/index')->with('message', 'Something went wrong: Category has not been found');

		} else {
			
			$products_in_category = Product::where('category_id', '=', $category->id)->count();

			if ( $products_in_category > 0 ){

				return Redirect::to('admin/categories/index')->with('message', 'Something went wrong: There are some products that depends on this category');
			} else {

				$category->delete();
				return Redirect::to('admin/categories/index')->with('message', 'Category Deleted');	

			}

		}

	}
}