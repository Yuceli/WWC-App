<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="lines">
					<h1 class="tittle">
						Women Who Code Mérida
					</h1>
				</div>
			</div>
		</div>
	</div>
</section>
<br>

<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Cursos disponibles</h1><br>
			</div>
			<?php foreach ($workshops as $workshop) { ?>
			<div class="col-md-4 text-center">
				<br>
				<?= "Nombre: $workshop->title <br>Fecha de inicio: $workshop->begin_date: <br>Fecha de finalización: $workshop->end_date" ?> 
				<a href="<?= URL::to("workshops.show.$workshop->id")?>">Mostrar</a> 
				<?php if(Session::read('user.role') === 'admin'): ?>
					|<a href="<?= URL::to("workshops.edit.$workshop->id")?>">Editar</a> |
					<a href="<?= URL::to("workshops.delete.$workshop->id")?>">Eliminar</a> 
				<?php endif; ?>
				<?php if(Session::read('user.role') === 'user'): ?>
					<?php $user = Auth::getUser() ?>
					<a href="<?= URL::to("subscriptions.store.$user->id.$workshop->id") ?>">Suscribirse</a>
				<?php endif; ?>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
