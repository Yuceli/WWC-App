<?php 

/**
* Classloader impl
* @author Arandi López <arandilopez.github.io>
*/
class ClassLoader {

	public static function loadClass($className)
	{
		$paths = include 'app/config/autoload.php';

		foreach ($paths as $path) {
			$filename = $path.$className.'.php';
			if (file_exists($filename)) {
				require $filename;
			}else{
				continue;
			}
		}
	}

	public static function register()
	{
		spl_autoload_register(array('self', 'loadClass'));
	}

	public static function unregister()
	{
		spl_autoload_unregister(array('self', 'loadClass'));
	}
}