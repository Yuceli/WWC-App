<?php 

/**
* Singleton abstract class
* @license GPLv3
*/
abstract class Singleton {
	
	public static function getInstance()
	{
		static $instance = null;
		if (is_null($instance)) {
			$instance = new static;
		}

		return $instance;
	}

	private function __clone()
	{
		throw new Exception("Uncloneable instance");
	}
}