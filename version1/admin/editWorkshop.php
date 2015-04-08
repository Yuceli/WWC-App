<?php

require '../app/config/config.php';
require '../app/controller/WorkshopController.php';

if ( isset($_GET['id']) ) {
  $id = $_GET['id'];

  $workshopController = new WorkshopController();
  $workshop = $workshopController->getById($id);
}

if ( $_SERVER['REQUEST_METHOD']==='POST') {
  $workshop = new stdClass();
  $workshop->id = $_POST['id'];
  $workshop->title = $_POST['title'];
  $workshop->description = $_POST['description'];
  $workshop->begin_date = $_POST['begin_date'];
  $workshop->end_date = $_POST['end_date'];

	$conn = getConnection();

  $stm = $conn->prepare("UPDATE workshops set title=?, description=?, begin_date=?, end_date=? WHERE id=?");
  $stm->bind_param("ssssi", $workshop->title, $workshop->description, $workshop->begin_date, $workshop->end_date, $workshop->id);
  $updated = $stm->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Editar taller</title>
  <link rel="stylesheet" href="../styles/workshop.css">
  <link rel="stylesheet" type="text/css" href="../styles/app.css">
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
      <h1>Editar taller</h1>
    </div>
    <?php if(isset($_SESSION['message'])){ ?>
      <div class="message"><?php echo $_SESSION['message']; ?></div>
      <?php unset($_SESSION['message']); ?>
    <?php } ?>
    <form action="editWorkshop.php" method="post">
      <li>
      <input type="text" name="title" placeholder="Título del taller" value="<?php echo $workshop->title ?>" required>
      </li>
      <li>
      <textarea rows="4" cols="54" name="description" placeholder="Descripción" required>
        <?php echo $workshop->description ?>
      </textarea>
      </li>
      <br>
      <li>
        <label for="begin_date">Fecha de Inicio</label>
        <input type="date" name="begin_date" value="<?php echo $workshop->begin_date ?>" required>
      </li>
      <br>
      <li>
        <label for="end_date">Fecha de Término</label>
        <input type="date" name="end_date" value="<?php echo $workshop->end_date ?>" required>
        <input type="hidden" name="id" value="<?php echo $workshop->id ?>">
      <ul class="buttons">
        <li><input type="submit" value="Guardar"></li>
        <!-- <li><input type="reset" value="Limpiar"></li> -->
      </ul>
    </form>
  </div>
</div>

</body>
</html>
