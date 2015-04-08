<div class="row">
    <form action="<?= URL::to("users.update.$user->id") ?>" method="POST" class="form-horizontal" role="form">
        <legend>Modificar a <?= $user->firstName ?></legend>
        <div class="form-group">
            <label for="name-imput">Nombre: </label>
            <input type="text" class="form-control" name="firstName" value="<?= $user->firstName ?>" id="name-input" placeholder="John" required>
        </div>
        <div class="form-group">
            <label for="lastname-input">Apellido: </label>
            <input type="text" name="lastName" value="<?= $user->lastName ?>" id="lastname-input" class="form-control" required placeholder="Doe">
        </div>
        <div class="form-group">
            <label for="email-input">E-mail: </label>
            <input type="email" name="email" value="<?= $user->email ?>" id="email-input" class="form-control" required placeholder="jdoe@example.com">
        </div>

        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>