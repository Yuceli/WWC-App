<div class="row">
	<h1>Cursos a los que estoy inscrito</h1>

	<ol>
	<?php foreach ($subscriptions as $subscription) { 
	$workshop = Workshop::find($subscription->workshop_id);?>
		<li>
			<?= "$workshop->title para el día $workshop->begin_date" ?> |
			<i class="glyphicon glyphicon-remove"></i>
			<a href="<?= URL::to("subscriptions.delete.$subscription->id") ?>">Quitar inscripción</a>
		</li>
	<?php } ?>
	</ol>
	<h4>Volver a los <a href="<?= URL::to("workshops") ?>">cursos</a>.</h4>
</div>