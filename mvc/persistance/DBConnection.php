<?php 

/**
* DBConnection
*/
class DBConnection {

	public static function getConnection()
	{
        $databaseConfig = include 'app/config/database.php';
		$type = $databaseConfig['default'];
		$connectionConfig = $databaseConfig['connections'][$type];
		try {
			
			$host = $connectionConfig['host'];
			$username = $connectionConfig['username'];
			$database = $connectionConfig['database'];
			$password = $connectionConfig['password'];
			$url = "$type:host=$host;dbname=$database";
			$pdoConnection = new PDO($url, $username, $password);
			$pdoConnection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			// $pdoConnection->setFetchMode(PDO::FETCH_ASSOC);

			return $pdoConnection;
		} catch (Exception $e) {
			echo $e->getMessage();
			return null;
		}
	}
}