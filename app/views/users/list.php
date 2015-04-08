<div class="row">
	<h1>Usuarios</h1>

	<ol>
	<?php foreach ($users as $user) { ?>
		<li>
			<?= "$user->firstName $user->lastName: $user->email" ?> |
			<a href="<?= URL::to("users.show.$user->id")?>">Mostrar</a> |
			<a href="<?= URL::to("users.edit.$user->id")?>">Editar</a> |
			<a href="<?= URL::to("users.delete.$user->id")?>">Eliminar</a>
		</li>
	<?php } ?>
	</ol>
</div>