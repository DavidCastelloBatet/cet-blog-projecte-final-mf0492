<?php include("includes/header_front.php") ?>

<?php

// instancio la base de dades i la conexio
$baseDades = new Basemysql();
$db = $baseDades->connect();

// valido la recepcio de l'id 
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

<div class="container-fluid">

    <div class="row">

        <div class="row">
            <div class="col-sm-12">

            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1><?= $resultat->titulo ?></h1>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid img-thumbnail" width="600px" src="<?= RUTA_FRONT ?>img/articulos/<?= $resultat->imagen ?>">
                    </div>

                    <p><?= $resultat->texto ?></p>

                </div>
            </div>
        </div>
    </div>

    <!-- COMENTARIS - PENDENT D'IMPLEMENTAR
    <div class="row">

        <div class="col-sm-6 offset-3">
            <form method="POST" action="">
                <input type="hidden" name="articulo" value="">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuari:</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" value="juangarcia@gmail.com" readonly>
                </div>

                <div class="mb-3">
                    <label for="comentario">Comentari</label>
                    <textarea class="form-control" name="comentario" style="height: 200px"></textarea>
                </div>

                <br />
                <button type="submit" name="enviarComentario" class="btn btn-primary w-100"><i class="bi bi-person-bounding-box"></i> Crear Nou Comentari</button>
            </form>
        </div>
    </div>

</div>

<div class="row">
    <h3 class="text-center mt-5">Comentaris</h3>

    <h4><i class="bi bi-person-circle"></i> juangarcia@gmail.com</h4>
    <p>texto comentario demo</p>

</div>
-->
</div>
<?php include("includes/footer.php") ?>