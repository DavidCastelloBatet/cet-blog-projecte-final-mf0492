<?php include("../includes/header.php") ?>

<div class="row">

</div>

<div class="row">
    <div class="col-sm-6">
        <h3>Crear un Nou Article</h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 offset-3">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Títol:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Escriu el títol">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imatge:</label>
                <input type="file" class="form-control" name="imagen" id="apellidos" placeholder="Selecciona una imatgen">
            </div>
            <div class="mb-3">
                <label for="texto">Text</label>
                <textarea class="form-control" placeholder="Escriu el text de l'artícle" name="texto" style="height: 200px"></textarea>
            </div>

            <br />
            <button type="submit" name="crearArticulo" class="btn btn-primary w-100"><i class="bi bi-person-bounding-box"></i> Crear un Nou Article</button>
        </form>
    </div>
</div>
<?php include("../includes/footer.php") ?>