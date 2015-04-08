<?php 

/**
* Config class
* @author Arandi López <arandilopez.github.io>
*/
class Config extends Singleton {
	
	public function get($key = false)
	{
		$configs = $this->getConfigArray();
		if ($key and array_key_exists($key, $configs)) {
			return $configs[$key];
		}else{
			return $configs;
		}
	}

	private function getConfigArray()
	{
		// return parse_ini_file("app/config/config.ini");
		$c = include 'app/config/app.php';
		return $c;
	}
}