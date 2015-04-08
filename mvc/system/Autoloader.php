<?php 

/**
* Autoloader by paths
* @author Arandi López <arandilopez.github.io>
*/
class Autoloader {

	protected $_path;
	protected $_namespace;

	function __construct($namespace, $path)
	{
		$this->_path = $path;
		$this->_namespace = $namespace;
	}

	public function register()
	{
		spl_autoload_register(array($this, 'loadClass'));
	}

	public function unregister()
	{
		spl_autoload_unregister(array($this, 'loadClass'));
	}

	public function loadClass($className)
	{
		$classPath = $this->_path.$className.'.php';
		if (file_exists($classPath)) {
			require $classPath;
		}
	}

}