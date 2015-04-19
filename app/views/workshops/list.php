<div class="row">
	<h1>Cursos disponibles</h1>

	<ol>
	<?php 
	$user = Auth::getUser();
	foreach ($workshops as $workshop) { ?>
		<li>
			<?= "$workshop->title $workshop->begin_date: $workshop->end_date" ?> |
			<!--
			<a href="<?= URL::to("workshops.show.$workshop->id")?>">Mostrar</a> |
			<a href="<?= URL::to("workshops.edit.$workshop->id")?>">Editar</a> |
			<a href="<?= URL::to("workshops.delete.$workshop->id")?>">Eliminar</a> |
			-->
			<i class="glyphicon glyphicon-edit"></i>
			<a href="<?= URL::to("subscriptions.store.$user->id.$workshop->id") ?>">Inscribirme</a>
		</li>
	<?php } ?>
	</ol>
</div>