<?php 

/**
* Redirect helper class
*/
class Redirect {

	public static function to($route=false)
	{
        $base = Config::getInstance()->get('base_url');
		if ($route) {
			header("Location: $base$route");
		}else{
			header("Location: $base");
		}
		exit();
	}
}