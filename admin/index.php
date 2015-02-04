<?php

require '../app/config/config.php';
require '../app/controller/WorkshopController.php';
require '../app/controller/UserController.php';


$controller = new WorkshopController();
$cursos = $controller->all();


$controller2 = new UserController();
$users = $controller2->all();


 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Administracion de WWC</title>
  <link rel="stylesheet" type="text/css" href="../styles/app.css">
</head>

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

    <?php } else { ?>
    <li><a href="login.php">Iniciar sesión</a></li>
    <?php } ?>

    </ul>
  </nav>
  <div class="content">



  <div class="centerTable">
    <h1>Usuarios</h1>
  <table class="tableWorkshops" style="width:50%">
  <tr>
    <td>Id</td>
    <td>Nombre</td>
    <td>Apellido</td>
    <td>Nickname</td>
    <td>Email</td>
    <td>Opciones</td>
  </tr>


  <?php foreach ($users as $user): ?>
  <tr>
    <td><?php echo $user->id ?></td>
    <td><?php echo $user->name ?></td>
    <td><?php echo $user->lastname ?></td>
    <td><?php echo $user->nickname ?></td>
    <td><?php echo $user->email ?></td>
    <td><a href="delete.php?id=<?php echo $user->id ?>">Eliminar</a><br><br><a href="editUser.php?id=<?php echo $user->id; ?>">Editar</a></td>
  </tr>
  <?php endforeach; ?>
</table>


<br><br><br>
<h1>Cursos</h1>
<table class="tableWorkshops" style="width:50%">
  <tr>
    <td>Id</td>
    <td>Título</td>
    <td>Descripción</td>
    <td>Fecha de inicio</td>
    <td>Fecha finalización</td>
    <td>Opciones</td>
  </tr>

  <?php foreach ($cursos as $curso): ?>
    <tr>
      <td><?php echo $curso->id ?></td>
      <td><?php echo $curso->title ?></td>
      <td><?php echo $curso->description ?></td>
      <td><?php echo $curso->begin_date ?></td>
      <td><?php echo $curso->end_date ?></td>
      <td><a href="deleteWorkshop.php?id=<?php echo $curso->id ?>">Eliminar</a><br><br><a href="editWorkshop.php?id=<?php echo $curso->id ?>">Editar</a></td>
    </tr>
  <?php endforeach; ?>
</table>
  </div>

</body>
</html>
