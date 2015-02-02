
<?php 

require '../app/config/config.php';

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
    <td>Password</td>
    <td>Admin</td>
    <td>Email</td>
    <td>Opciones</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Yuceli</td> 
    <td>Polanco</td>
    <td>Yuz</td>
    <td>12345</td>
    <td>No</td>
    <td>yuceli.polanco@gmail.com</td>
    <td><a href="">Eliminar</a><br><br><a href="">Editar</a></td>
  </tr>
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

  <tr>
    <td>1</td>
    <td>Front-End</td> 
    <td>Aprendizaje básico de HTML5 y CSS3</td>
    <td>13/02/2015</td>
    <td>20/02/2015</td>
    <td><a href="">Eliminar</a><br><br><a href="">Editar</a></td>
  </tr>
</table>
  </div>
  
</body>
</html>