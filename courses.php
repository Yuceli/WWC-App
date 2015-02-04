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
	<h1>Lorem ipsum dolor sit amet, consectetur.</h1>
</div>
<div>
	<p>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis consequuntur saepe consectetur iste porro atque nemo numquam amet eius in quas unde beatae quis reiciendis earum deleniti iure officiis, aliquid, tempore labore placeat! Omnis blanditiis quidem provident laborum officiis modi, aperiam assumenda iure totam delectus debitis veniam harum ut placeat magni accusantium. Fuga, accusantium, delectus.
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