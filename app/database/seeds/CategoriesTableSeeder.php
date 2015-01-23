<?php

class CategoriesTableSeeder extends Seeder {

	public function run() {

		$category = new Category;
		$category->name = 'Desktops';
		$category->save();
		
		$category = new Category;
		$category->name = 'Laptops';
		$category->save();
		
		$category = new Category;
		$category->name = 'Tablets';
		$category->save();
		
		$category = new Category;
		$category->name = 'Smartphones';
		$category->save();
	}
}