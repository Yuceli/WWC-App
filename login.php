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
			<h1>Ingrese sus datos</h1>
		</div>
		<form action="login.php" method="post">
			<li>
				<input type="text" name="nickname" placeholder="Nombre de usuario" required>
			</li>
			<li>
				<input type="password" name="password" placeholder="Contraseña" required>
			</li>
			<ul class="buttons">
				<li><input type="submit" value="Ingresar"></li>
				<li><input type="reset" value="Limpiar"></li>
				<li><a href="register.php">Registrarse&raquo;</a></li>
			</ul>
		</form>
	</div>
</div>

</body>
</html>