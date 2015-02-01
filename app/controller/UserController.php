<?php 
	/**
	* 
	*/

	require '../config/db.php';
	
	namespace 'app\controller'

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
