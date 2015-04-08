<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Women Who Code Mérida</title>
	<link rel="stylesheet" type="text/css" href="styles/app.css">
</head>
<body>
<div class="main">
	<nav class="navbar">
		<ul class="left-part">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="courses.php">Cursos</a></li>
			<?php if ( isset($_SESSION['nickname']) && $_SESSION['nickname'] === 'admin' ) {  ?>
			<li><a href="new-workshop.php">Nuevo curso</a></li>
			<li><a href="admin/">Administración</a></li>
			<?php } ?>
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