<?php include("../includes/header.php") ?>
<?php

// instancio la base de dades i la conexio
$baseDades = new Basemysql();
$db = $baseDades->connect();

// valido la recepcio de l'id que arriva d'articles.php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

// instancio l'objecte Article_model
$article = new Article_model($db);

// crido el metode de l'objecte i li paso la id de l'article rebuda per GET
$resultat = $article->llegir_individual($id);

?>

<div class="row">

</div>

<div class="row">
    <div class="col-sm-6">
        <h3>Editar l'Artícle</h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 offset-3">
        <!-- el formulari tindrà el enctype="multipart/form-data", ja que pujarem dades a la bbdd -->
        <form method="POST" action="" enctype="multipart/form-data">

            <input type="hidden" name="id" value="4">

            <div class="mb-3">
                <label for="titulo" class="form-label">Títol:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?= $resultat->titulo ?>">
            </div>

            <div class="mb-3">
                <img class="img-fluid img-thumbnail" src="<?= RUTA_FRONT . 'img/articulos/' . $resultat->imagen; ?>">
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imatge:</label>
                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Selecciona una imagen">
            </div>
            <div class="mb-3">
                <label for="texto">Text</label>
                <textarea class="form-control" placeholder="Escriba el texto de su artículo" name="texto" style="height: 200px">
                    <?= $resultat->texto ?>
                </textarea>
            </div>

            <br />
            <button type="submit" name="editarArticulo" class="btn btn-success float-left"><i class="bi bi-person-bounding-box"></i> Editar l'Artícle</button>

            <button type="submit" name="borrarArticulo" class="btn btn-danger float-right"><i class="bi bi-person-bounding-box"></i> Esborrar l'Artícle</button>
        </form>
    </div>
</div>
<?php include("../includes/footer.php") ?>