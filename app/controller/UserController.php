<?php 
	/**
	* 
	*/

	//require '../config/db.php';
	
	//namespace 'app\controller'

	class UserController
	{
		
		function __construct()
		{
			
		}

		public static function save($user)
		{
	     
	     $con = getConnection(); 
	     $statment = $con->prepare("INSERT INTO users (name, lastname, nickname, password, email) VALUES (?, ?, ?, ?, ?)");
         $statment->bind_param("sssss", $user->name, $user->lastname, $user->nickname, $user->password, $user->email);
         $statment->execute();
         $statment->close();
         $con->close();

		}

		public static function update($user)
		{
		 $con = getConnection(); 
	     $statment = $con->prepare("UPDATE users SET name=?, lastname=?, nickname=?, password=?, email=? WHERE id=?");
         $statment->bind_param("sssssi", $user->name, $user->lastname, $user->nickname, $user->password, $user->email, $user->id);
         $statment->execute();
         $statment->close();
         $con->close();

		}

		public static function all()
		{
			$con = getConnection();
			$result = $con->query("SELECT * from users");

			if ($result->num_rows > 0) {
				$users = array();
			    while($row = $result->fetch_assoc()) {
			    	$user = new stdClass();
			    	$user->id          = $row["id"];
			    	$user->name        = $row["name"];
			    	$user->lastname    = $row["lastname"];
			    	$user->nickname    = $row["nickname"];
			    	$user->email       = $row["email"];

			    	array_push($users, $user);
			    }
			} else {
			    echo "0 results";
			}
			$con->close();

			return $users;
		}

		public static function delete($id)	
		{
		
		 $con = getConnection(); 
	     $statment = $con->prepare("DELETE FROM users WHERE id=?");
         $statment->bind_param("i", $user->id);
         $statment->execute();
         $statment->close();
         $con->close();	
		}

		public static function getById($id)
		{
			# code...
		}

	}
