<?php 

require 'app/config/config.php';


if( $_SERVER['REQUEST_METHOD']==='POST' ){
	// header('Location: index.php');
	$nickname = $_POST['nickname'];
	$password = $_POST['password'];
	$conn = getConnection();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Iniciar sesión</title>
	<link rel="stylesheet" href="styles/login.css">
</head>
<body>

<div class="main">
	<div class="login">
		<div class="login-head">
			<h1>Ingrese sus datos para registrarse</h1>
		</div>
		<form action="register.php" method="post">
			<li>
				<input type="text" name="name" placeholder="Nombre" required>
			</li>
			<li>
				<input type="text" name="lastname" placeholder="Apellido" required>
			</li>
			<li>
				<input type="text" name="nickname" placeholder="Nombre de usuario" required>
			</li>
			<li>
				<input type="password" name="password" placeholder="Contraseña" required>
			</li>
			<li>
				<input type="password" name="repassword" placeholder="Repita la contraseña" required>
			</li>
			<ul class="buttons">
				<li><input type="submit" value="Registrarme"></li>
				<li><input type="reset" value="Limpiar"></li>
				<li><a href="login.php">&laquo;Regresar</a></li>
			</ul>
		</form>
	</div>
</div>

</body>
</html>