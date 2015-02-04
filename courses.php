<?php 

require 'app/config/config.php';

include 'app/includes/header.php';

include 'app/controller/WorkshopController.php';

$controller = new WorkshopController();
$cursos = $controller->all();

if(isset($_SESSION['id'])) {
	$logged = true;
	$user = $_SESSION['id'];
}
else {
	$logged = false;
}

?>

<div class="page-header">
	<h1>Lista de cursos disponibles</h1>
</div>
<div>
	<p>
		Las charlas con mentores serán distintas a lo largo del año,
		dado que se pretende dar a conocer la experiencia de distintas
		mujeres/hombres líderes en el área de tecnología. Está disponible
		la opción de que la Institución invite a sus propios mentores o líderes
		en el área para impartir charlas a los asistentes. La invitación es tanto
		para quienes estén interesados en tomar los talleres como para aquellos que desee
		compartir sus habilidades, conocimientos y experiencias.
	</p>
	<br>
	<h1>Crecimiento de la comunidad</h1>
	<p>
      Con motivo de potencializar el aumento de las mujeres en la tecnología sin dejar
      de un lado al género masculino interesado, se permitirá que estos asistan a cualquier
      taller o curso, siempre y cuando vaya acompañado de una mujer durante la duración total
      del taller seleccionado.
	</p>
</div>
<div class="courses-list">
	<?php 
		foreach ($cursos as $curso): ?>
		<div class="course">
			<h1><?php echo $curso->title ?></h1>
			<p><?php echo $curso->description ?></p>
			<h4>Inicia: <?php echo $curso->begin_date ?></h4>
			<?php if($logged && !$controller->isSubscribed($user, $curso->id)){ ?>
			<form action="subscribe.php" method="get">
				<input type="hidden" name="course_id" value=<?php echo $curso->id ?> >
				<input type="submit" value="Inscribirme">
			</form>
			<?php } ?>
		</div>
	<?php endforeach; ?>
</div>

 <?php 

include 'app/includes/footer.php';

 ?>