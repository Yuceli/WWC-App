<?php 

/**
* Archivo de configuraciones multiples
*/
session_start();

// Load files
require 'db.php';

# Place all clases to autoload
# You need to put complete path
$clases = array(


);

spl_autoload_register(function($clases){
	foreach ($clases as $class) {
		if(file_exists($class)){
			require_once $class;
		}
	}
});