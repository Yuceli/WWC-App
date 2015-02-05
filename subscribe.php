<?php 

	require 'app/config/config.php';

	include 'app/includes/header.php';

	if(isset($_SESSION['id'])){
		$course_id 	= $_GET['course_id'];
		$user_id	= $_SESSION['id'];
		$dt = date("Y-m-d H:i:s");
		$conn = getConnection();
		$stm = $conn->prepare("INSERT INTO users_workshops (user_id, workshop_id, inscription_date) VALUES (?,?,?)");
		$stm->bind_param("iis", $user_id, $course_id, $dt);
		$inserted = $stm->execute();
		if($inserted){
			$stm->close();
			$conn->close();
			?><div class="msg success">Te has registrado exitosamente al taller.</div><?php
		}else{
			?><div class="msg error">Ocurrió un error al intentar registrarte al curso.</div><?php 
		}
	}
	else{ ?>
		<div class="msg info">Necesitas iniciar sesión para registrarte.</div>
	<?php } ?> 

	
<?php 

include 'app/includes/footer.php'; 

?>