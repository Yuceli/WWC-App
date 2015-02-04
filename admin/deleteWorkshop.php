<?php

require '../app/config/config.php';
require '../app/controller/WorkshopController.php';

if ( isset($_GET['id']) ) {
  $id = $_GET['id'];

  $workshopController = new WorkshopController();
  $user = $workshopController->getById($id);
  $workshopController->delete($id);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Women Who Code Mérida</title>
	<link rel="stylesheet" type="text/css" href="../styles/app.css">
</head>
<body>
<div class="main">
	<nav class="navbar">
		<ul class="left-part">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="courses.php">Cursos</a></li>
		</ul>
		<ul class="right-part">
		<?php if ( isset($_SESSION['nickname']) ){  ?>
		<li class="navtext"><?php echo 'Bienvendo ' . $_SESSION['name']; ?> <a href="logout.php">Salir</a></li>

		<?php	} else { ?>
		<li><a href="login.php">Iniciar sesión</a></li>
		<?php	} ?>

		</ul>
	</nav>
	<div class="content">

<div class="page-header">
  <h1>El curso <?php echo $workshop->title; ?> ha sido eliminado.</h1>
</div>

	</div>
</div> <!--  Final del div main -->
<footer>
	<p>Copyright &copy; 2015 - WWC Mérida</p>
</footer>
<script type="text/javascript" src="../scripts/app.js"></script>
</body>
</html>
