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
		</ul>
		<ul class="right-part">
		<?php if ( isset($_SESSION['idUser']) ){  ?>
		<li><?php echo 'Bienvendo ' . $_SESSION['id']; ?></li>
		<?php	} else { ?>
		<li><a href="login.php">Iniciar sesión</a></li>
		<?php	} ?>
			
		</ul>
	</nav>
	<div class="content">