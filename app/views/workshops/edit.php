<br><br><br><br>
<section>
    <div class="container">
        <div class="row">
            <form action="<?= URL::to("workshops.update.$workshops->id") ?>" method="POST" class="form-horizontal" role="form">
                <legend>Modificar a <?= $workshops->title ?></legend>
                <div class="form-group">
                    <label for="title-imput">Título: </label>
                    <input type="text" class="form-control" name="title" value="<?= $workshops->title ?>" id="title-input" placeholder="Título" required>
                </div>
                <div class="form-group">
                    <label for="description-input">Descripción: </label>
                    <input type="text" name="description" value="<?= $workshops->description ?>" id="description-input" class="form-control" required placeholder="Descripcióm">
                </div>
                <div class="form-group">
                    <label for="begin_date-input">Fecha inicio: </label>
                    <input type="date" name="begin_date" value="<?= $workshops->begin_date ?>" id="begin_date-input" class="form-control" required placeholder="Fecha inicio">
                </div>

                <div class="form-group">
                    <label for="end_date-input">Fecha finalización: </label>
                    <input type="date" name="end_date" value="<?= $workshops->end_date ?>" id="end_date-input" class="form-control" required placeholder="Fecha finalización">
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>        
    </div>
</section>
