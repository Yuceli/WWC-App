<br><br><br><br>
<section>
	<div class="container">
		<div class="row">
			<form action="<?= URL::to('workshops.store') ?>" method="POST" class="form-horizontal" role="form">
				<legend>Añadir cursos</legend>
				
				<div class="form-group">
					<label for="title-imput">Título: </label>
					<input type="text" class="form-control" name="title" id="name-input" placeholder="Título" required>
				</div>
				<div class="form-group">
					<label for="description-input">Descripción: </label>
					<input type="text" name="lastName" id="description" class="form-control" required placeholder="Descrpción">
				</div>
				<div class="form-group">
					<label for="begin_date-input">Fecha de inicio: </label>
					<input type="date" name="begin_date" id="email-input" class="form-control" required placeholder="Fecha de inicio">
				</div>
				<div class="form-group">
					<label for="end_date-input">Fecha de finalización: </label>
					<input type="date" name="end_date" id="password-input" class="form-control" required placeholder="Fecha finalización">
				</div>
				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<button type="submit" class="btn btn-primary">Añadir</button>
					</div>
				</div>
			</form>
		</div>		
	</div>
</section>
