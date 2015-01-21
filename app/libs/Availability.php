<?php

class Availability {

	public static function display($availability) {

		if ( $availability == 0) {

			echo 'Out of Stock';

		} else if ($availability == 1) {

			echo 'In Stock'; 

		} else {

			echo 'ERROR No valid value for stock, should be 0 or 1 but there is another';

		}
	}

	public static function displayClass($availability) {

		if ( $availability == 0) {

			echo 'outofstock';

		} else if ($availability == 1) {

			echo 'instock'; 

		} else {

			echo 'ERROR No valid value for stock, should be 0 or 1 but there is another';

		}
	}
}