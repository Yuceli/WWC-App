<?php 

require 'app/config/config.php';
require 'app/includes/helper.php';
include 'app/includes/header.php';


if( $_SERVER['REQUEST_METHOD']==='POST' ){
	// header('Location: index.php');
	$nickname = $_POST['nickname'];
	$password = $_POST['password'];
	$conn = getConnection();

	$stm = $conn->prepare("SELECT id, name, lastname, nickname, email FROM users WHERE nickname=? and password=? LIMIT 1");

	$pwd = pwdcrypt($password);

	$stm->bind_param("ss", $nickname, $pwd);
	if ($stm->execute()) {
		$stm->bind_result($id, $name, $lastname, $nick, $mail);
		if($stm->fetch()){
			$_SESSION['id'] = $id;
			$_SESSION['name'] = $name;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['nickname'] = $nick;
			$_SESSION['email'] = $mail;
			header('Location: index.php');
		}
		else{
			$_SESSION['message'] = 'Datos incorrectos';
		}
	}
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
		<?php if(isset($_SESSION['message'])){ ?>
			<div class="message"><?php echo $_SESSION['message']; ?></div>
			<?php unset($_SESSION['message']); ?>
		<?php	} ?>
		<form action="login.php" method="post">
			<li>
				<input type="text" name="nickname" placeholder="Nombre de usuario" required>
			</li>
			<li>
				<input type="password" name="password" placeholder="Contraseña" required>
			</li>
			<ul class="buttons">
				<li><input type="submit" value="Ingresar"></li>
				<!-- <li><input type="reset" value="Limpiar"></li> -->
				<li><a href="register.php">Registrarse&raquo;</a></li>
			</ul>
		</form>
	</div>
</div>

</body>
</html>