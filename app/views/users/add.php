<div class="row">
	<form action="<?= URL::to('users.store') ?>" method="POST" class="form-horizontal" role="form">
			<legend>Añadir Usuarios</legend>
		
			<div class="form-group">
				<label for="name-imput">Nombre: </label>
				<input type="text" class="form-control" name="firstName" id="name-input" placeholder="John" required>
			</div>
			<div class="form-group">
				<label for="lastname-input">Apellido: </label>
				<input type="text" name="lastName" id="lastname-input" class="form-control" required placeholder="Doe">
			</div>
			<div class="form-group">
				<label for="email-input">E-mail: </label>
				<input type="email" name="email" id="email-input" class="form-control" required placeholder="jdoe@example.com">
			</div>
			<div class="form-group">
				<label for="password-input">Contraseña: </label>
				<input type="password" name="password" id="password-input" class="form-control" required placeholder="tu contraseña">
			</div>
            <div class="form-group">
                <label for="role-input">Role: </label>
                <input type="text" name="role" id="role-input" class="form-control" required placeholder="user">
            </div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button type="submit" class="btn btn-primary">Añadir</button>
				</div>
			</div>
	</form>
</div>