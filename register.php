<?php 

require 'app/config/config.php';
require 'app/includes/helper.php';


if( $_SERVER['REQUEST_METHOD']==='POST' ){
	// header('Location: index.php');
	$nickname = $_POST['nickname'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	
	$conn = getConnection();

	if($repassword !== $password){
		$_SESSION['message'] = "Contraseña no corresponde a la confirmación";
	}else{
		$pwd = pwdcrypt($password);
		$stm = $conn->prepare("INSERT INTO users (name, lastname, email, nickname, password) VALUES (?,?,?,?,?)");
		$stm->bind_param("sssss", $name, $lastname, $email, $nickname, $pwd);
		$inserted = $stm->execute();
		if($inserted){
			$stm->close();
			$conn->close();
			$_SESSION['message'] = 'Usuario creado correctamente. Inicie sesión';
			header('Location: login.php');
		}else{
			$_SESSION['message'] = 'No se guardo: ' . $conn->error .' '. $stm->error;
		}
		
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Registrarse</title>
	<link rel="stylesheet" href="styles/login.css">
</head>
<body>

<div class="main">
	<div class="login">
		<div class="login-head">
			<h1>Ingrese sus datos para registrarse</h1>
		</div>
		<?php if(isset($_SESSION['message'])){ ?>
				<div class="message"><?php echo $_SESSION['message']; ?></div>
				<?php unset($_SESSION['message']); ?>
		<?php	} ?>
		<form action="register.php" method="post">
			<li>
				<input type="text" name="name" placeholder="Nombre" required>
			</li>
			<li>
				<input type="text" name="lastname" placeholder="Apellido" required>
			</li>
			<li>
				<input type="email" name="email" placeholder="Correo electronico" required>
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