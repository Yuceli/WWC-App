<?php

require 'app/config/config.php';
require 'app/includes/helper.php';
require 'app/controller/WorkshopController.php';


if( $_SERVER['REQUEST_METHOD']==='POST' ){
  // header('Location: index.php');
  $title       = $_POST['title'];
  $description = $_POST['description'];
  $begin_date  = $_POST['begin_date'];
  $end_date    = $_POST['end_date'];
  $conn = getConnection();

  $controller = new WorkshopController();
  $workshop   = new stdClass();

  $workshop->title       = $title;
  $workshop->description = $description;
  $workshop->begin_date  = $begin_date;
  $workshop->end_date    = $end_date;

  $controller->save($workshop);

  $_SESSION['message'] = 'Operación correcta';
  header('Location: index.php');

}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Nuevo Taller</title>
  <link rel="stylesheet" href="styles/workshop.css">
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
    <?php if ( isset($_SESSION['nickname']) ){  ?>
    <li class="navtext"><?php echo 'Bienvendo ' . $_SESSION['name']; ?> <a href="logout.php">Salir</a></li>

    <?php } else { ?>
    <li><a href="login.php">Iniciar sesión</a></li>
    <?php } ?>

    </ul>
  </nav>
  <div class="content">


<div class="main">
  <div class="login">
    <div class="login-head">
      <h1>Nuevo Taller</h1>
    </div>
    <?php if(isset($_SESSION['message'])){ ?>
      <div class="message"><?php echo $_SESSION['message']; ?></div>
      <?php unset($_SESSION['message']); ?>
    <?php } ?>
    <form action="new-workshop.php" method="post">
      <li>
        <input type="text" name="title" placeholder="Título del taller" required>
      </li>
      <li>
        <textarea rows="4" cols="54" name="description" placeholder="Descripción" required></textarea>
      </li>
      <br>
      <li>
        <label for="begin_date">Fecha de Inicio</label>
        <input type="date" name="begin_date" required>
      </li>
      <br>
      <li>
        <label for="end_date">Fecha de Término</label>
        <input type="date" name="end_date" required>
      <ul class="buttons">
        <li><input type="submit" value="Guardar"></li>
        <!-- <li><input type="reset" value="Limpiar"></li> -->
      </ul>
    </form>
  </div>
</div>

</body>
</html>
