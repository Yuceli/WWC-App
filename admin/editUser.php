<?php

require '../app/config/config.php';
require '../app/controller/UserController.php';

if ( isset($_GET['id']) ) {
  $id = $_GET['id'];

  $userController = new UserController();
  $user = $userController->getById($id);
}

if ( $_SERVER['REQUEST_METHOD']==='POST') {
	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$nickname = $_POST['nickname'];
  $id = $_POST['id'];

  $user = new stdClass();
  $user->name = $name;
  $user->lastname = $lastname;
  $user->email = $email;
  $user->nickname = $nickname;
  $user->id = $id;

	$conn = getConnection();

  $stm = $conn->prepare("UPDATE users set name=?, lastname=?, email=?, nickname=? WHERE id=?");
  $stm->bind_param("ssssi", $name, $lastname, $email, $nickname, $id);
  $updated = $stm->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Registrarse</title>
	<link rel="stylesheet" href="../styles/login.css">
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
		<form action="editUser.php" method="post">
			<li>
      <input type="text" name="name" placeholder="Nombre" value="<?php echo $user->name ?>" required>
			</li>
			<li>
      <input type="text" name="lastname" placeholder="Apellido" value="<?php echo $user->lastname ?>" required>
			</li>
			<li>
      <input type="email" name="email" placeholder="Correo electronico" value="<?php echo $user->email ?>" required>
			</li>
			<li>
      <input type="text" name="nickname" placeholder="Nombre de usuario" value="<?php echo $user->nickname ?>" required>
			</li>
      <input type="hidden" name="id", value="<?php echo $id; ?>">
			<ul class="buttons">
				<li><input type="submit" value="Guardar"></li>
				<li><input type="reset" value="Limpiar"></li>
				<li><a href="login.php">&laquo;Regresar</a></li>
			</ul>
		</form>
	</div>
</div>

</body>
</html>
