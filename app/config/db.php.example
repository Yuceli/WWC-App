<?php 
/**
*	Configuracion de la conexion de la base de datos
*/
define('DB_URL', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
// define('DB_PORT', 'value');
define('DB_NAME', 'wwc');

function getConnection()
{
	# Get a new DB conection using mysqli as object
	$con = new mysqli(DB_URL, DB_USER, DB_PASSWORD);
	if($con->connect_error){
		die("Conexión fallida: " . $con->connect_error);
	}
	$con->select_db(DB_NAME);
	return $con;
}