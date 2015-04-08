<?php

	/**
	*
	*/

	//namespace 'app\controller'

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
			$con = getConnection();
			$result = $con->query("SELECT * from workshops");
      $cursos = array();

			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    	$curso = new stdClass();
			    	$curso->id          = $row["id"];
			    	$curso->title       = $row["title"];
			    	$curso->description = $row["description"];
			    	$curso->begin_date  = $row["begin_date"];
			    	$curso->end_date    = $row["end_date"];

			    	array_push($cursos, $curso);
			    }
			} else {
			    echo "0 results";
			}
			$con->close();

			return $cursos;
		}

		public static function delete($id)
		{
			 $con = getConnection();
		     $statment = $con->prepare("DELETE FROM workshops WHERE id=?");
	         $statment->bind_param("i", $id);
	         $statment->execute();
	         $statment->close();
	         $con->close();
		}

		public static function getById($id)
		{
			$con = getConnection();
      $result = $con->query( " SELECT * FROM workshops WHERE id={$id}");
      if ( $result->num_rows == 1 ) {
        $row = $result->fetch_assoc();
        $curso = new stdClass();
        $curso->id          = $row["id"];
        $curso->title       = $row["title"];
        $curso->description = $row["description"];
        $curso->begin_date  = $row["begin_date"];
        $curso->end_date    = $row["end_date"];

        return $curso;
      }
      $con->close();
		}

		// Cambios de Javier Ojeda
		public static function isSubscribed($user, $workshop){
			$con = getConnection();
			$result = $con->query('SELECT * FROM users_workshops WHERE user_id='.$user.' AND workshop_id='.$workshop);
			return ($result->num_rows > 0);
		}
	}
