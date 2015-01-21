<?php

class BaseController extends Controller {

	public function __construct(){

		$this->beforeFilter(function(){
			View::share('catnav', Category::all());
		});
	}

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
