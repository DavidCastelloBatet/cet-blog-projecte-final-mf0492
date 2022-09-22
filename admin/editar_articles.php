<?php include("../includes/header.php") ?>

<div class="row">

</div>

<div class="row">
    <div class="col-sm-6">
        <h3>Editar l'Artícle</h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 offset-3">
        <form method="POST" action="" enctype="multipart/form-data">

            <input type="hidden" name="id" value="4">

            <div class="mb-3">
                <label for="titulo" class="form-label">Títol:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="titulo test">
            </div>

            <div class="mb-3">
                <img class="img-fluid img-thumbnail" src="../img/articulos/img4.jpg">
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imatge:</label>
                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Selecciona una imagen">
            </div>
            <div class="mb-3">
                <label for="texto">Text</label>
                <textarea class="form-control" placeholder="Escriba el texto de su artículo" name="texto" style="height: 200px">
                ejemplo texto
                </textarea>
            </div>

            <br />
            <button type="submit" name="editarArticulo" class="btn btn-success float-left"><i class="bi bi-person-bounding-box"></i> Editar l'Artícle</button>

            <button type="submit" name="borrarArticulo" class="btn btn-danger float-right"><i class="bi bi-person-bounding-box"></i> Esborrar l'Artícle</button>
        </form>
    </div>
</div>
<?php include("../includes/footer.php") ?>