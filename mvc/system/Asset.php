<?php 


/**
* Asset helper
* @author Arandi López <arandilopez.93@gmail.com>
*/
class Asset {

	static $css = [];
	static $js = [];

	public static function addJs($name = false, $source = false)
	{
		if($source and $name)
		{
			$s = str_replace('.', '/', $source);
			self::$js['name'] = "assets/js/".$s.".js";
		}
	}

	public static function addCss($name = false, $source = false)
	{
		if ($source and $name) 
		{
			$s = str_replace('.', '/', $source);
			self::$css['name'] = "assets/css/".$s.".css";
		}
	}

	public static function flushCss()
	{
		self::$css = [];
	}

	public static function flushJs()
	{
		self::$js = [];
	}

	public static function js()
	{
		$baseURL = Config::getInstance()->get('base_url');
		foreach (self::$js as $name => $source) 
		{
			print "<script src=\"$baseURL$source\"></script>\n";
		}
	}

	public static function css()
	{
		$baseURL = Config::getInstance()->get('base_url');
		foreach (self::$css as $name => $source) 
		{
			print "<link rel=\"stylesheet\" href=\"$baseURL$source\">\n";
		}
	}

	public function get($asset)
	{
		$baseURL = Config::getInstance()->get('base_url');
		$assetUrl = $baseURL.'/other/'.$asset;
		return $assetUrl;
	}
}