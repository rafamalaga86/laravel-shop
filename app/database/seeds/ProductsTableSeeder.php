<?php

class ProductsTableSeeder extends Seeder {

	public function run() {

		$adjectives = ['Great', 'Megachungo', 'Incredible', 'Pichitrónico'];


		for ( $i = 0 ; $i < 20 ; $i++){

			$product = new Product;

			$product->category_id = rand(1, Category::all()->count() );
			$product->title = $adjectives[ rand( 0, count($adjectives) - 1 ) ] . ' ' . rtrim(Category::find($product->category_id)->name, 's');
			$product->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae atque animi, at. Ab veniam, provident, quae incidunt eos nihil officia accusantium tempora accusamus porro iure possimus. Quibusdam reprehenderit illo a!';
			$product->price = 300 + rand(-200, 400);
			$product->image = '/img/products/' . strtolower(rtrim(Category::find($product->category_id)->name, 'es')) . '.jpg';

			$product->save();
		}
	}
}