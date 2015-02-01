<?php 

	/**
	* 
	*/

	namespace 'app\controller'

	class WorkshopController
	{
		
		function __construct()
		{
			
		}

		public static function save($workshop)
		{
			 $con = getConnection(); 
		     $statment = $con->prepare("INSERT INTO workshops (title, description, begin_date, end_date) VALUES (?, ?, ?, ?)");
	         $statment->bind_param("ssss", $workshop->title, $workshop->description, $workshop->begin_date, $workshop->end_date);
	         $statment->execute();
	         $statment->close();
	         $con->close();
		}

		public static function update($workshop)
		{
			 $con = getConnection(); 
		     $statment = $con->prepare("UPDATE workshops SET title=?, description=?, begin_date=?, end_date=?, WHERE id=?");
	         $statment->bind_param("ssssi", $workshop->name, $workshop->lastname, $workshop->nickname, $workshop->password, $workshop->email, $user->id);
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
		     $statment = $con->prepare("DELETE FROM workshops WHERE id=?");
	         $statment->bind_param("i", $workshop->id);
	         $statment->execute();
	         $statment->close();
	         $con->close();	
		}

		public static function getById($id)
		{
			# code...
		}
	}