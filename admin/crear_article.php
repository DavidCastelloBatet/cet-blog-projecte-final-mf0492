<?php include("../includes/header.php") ?>

<?php

// instancio la base de dades i la conexio
$baseDades = new Basemysql();
$db = $baseDades->connect();

// CRUD - CREACIO DE L'ARTICLE

// valido la recepcio de valors del formulari que arriva de crear_article.php
// quan s'apreta el boto amb el name = "crearArticulo" pasa el següent:

if (isset($_POST['crearArticulo'])) {
    //Obtenim els valors que arriven del formulari
    $titol = $_POST['titulo'];
    $text = $_POST['texto'];

    // Validacions per l'imatge
    // si la quantitat d'errors trobats (extensio, tamany, etc...) es > 0 llavors
    if ($_FILES['imagen']['error'] > 0) {
        $error = "No s'ha seleccionat cap arxiu";
    } else {
        //si entra aquest else, es que la imatge s'ha adjuntat sense errors
        // es validen la resta de camps
        // ULL!! amb els = i els == NO es lo mateix... despres estas 2 hores buscant la cagada...
        if (empty($titol) || $titol == '' || empty($text) || $text == '') {
            $error = "Alguns camps estan buits";
        } else {
            // si entra aquest else, vol dir que s'han enviat tots els camps amb dades
            // i podem començar la pujada d'arxius

            // obtenim el nom de l'arxiu
            $image = $_FILES['imagen']['name'];
            // separem el nom de l'extensio de l'arxiu
            $imageArr = explode('.', $image);
            // creem un nom (sense extensio) random per la imatge
            $rand = rand(1000, 999999);
            // concatenem totes les dades (nom antic + random nom + el punt + l'extensio )
            $newImageName = $imageArr[0] . $rand . '.' . $imageArr[1];
            // creem la ruta final
            $rutaFinal = "../img/articulos/" . $newImageName;
            // finalment, pujo la imatge
            move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaFinal);

            // instanciem l'objecte article
            $article = new Article_model($db);

            // creem el nou article i redireccionem
            if ($article->crear($titol, $newImageName, $text)) {
                $missatge = "Article creat correctament";
                header("Location:articles.php?missatge=" . urlencode($missatge));
            }
        }
    }
}

?>

<!-- missatge d'error -->
<div class="row">
    <div class="col-sm-12">
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?= $error; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- final missatge d'error -->

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