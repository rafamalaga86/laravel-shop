<?php

class ProductsController extends BaseController {

	public function getIndex(){

		$categories = array();

		foreach (Category::all() as $category){

			$categories[$category->id] = $category->name;
		}

		return View::make('products/index')
			->with('products', Product::all())
			->with('categories', $categories);
	}

	public function postCreate(){
		$validator = Validator::make(Input::all(), Product::$rules);

		if ($validator->passes()){

			$product = new Product;

			$product->title = Input::get('title');
			$product->description = Input::get('description');
			$product->price = Input::get('price');
			$product->category_id = Input::get('category_id');

			$image = Input::file('image');
			$filename = date('Y-m-d-H:i:s').'-'.$image->getClientOriginalName();
			$product->image = '/img/products/' . $filename;

			$product->save();

			Image::make($image->getRealPath())->resize(468, 249)->save('img/products/' . $filename);


			return Redirect::back()->with('message', 'Product Created.');

		} else {

			return Redirect::back()->withInput()->with('message', 'Something went wrong.')->withErrors($validator);
		}
	}

	public function postDestroy(){
		$product = Product::find(Input::get('id'));

		if (empty($product)){

			return Redirect::back()->with('message', 'Something went wrong: Product has not been found.');

		} else {

			$product->delete();
			return Redirect::back()->with('message', 'Product Deleted');
		}
	}

	public function postToggleAvailability(){

		$product = Product::find(Input::get('id'));

		if (empty($product)){

			return Redirect::back()->with('message', 'Something went wrong: Product has not been found.');

		} else {

			$product->availability = Input::get('availability');
			$product->save();

			return Redirect::back()->with('message', 'Product Updated');

		}
	}

}