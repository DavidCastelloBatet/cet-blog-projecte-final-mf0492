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


// CRUD - ACTUALITZAR L'ARTICLE
if (isset($_POST['editarArticulo'])) {
    // recullo el valor de l'id que ve del input ocult del formulari
    $idArticle = $_POST['id'];
    //Obtenim els valors que arriven del formulari
    $titol = $_POST['titulo'];
    $text = $_POST['texto'];

    // Validacions per l'imatge
    // si la quantitat d'errors trobats (extensio, tamany, etc...) es > 0 llavors
    if ($_FILES['imagen']['error'] > 0) {
        // no s'actualitza la imatge però si els camps de text
        if (empty($titol) || $titol == '' || empty($text) || $text == '') {
            $error = "Alguns camps estan buits";
        } else {
            // instanciem l'objecte article
            $article = new Article_model($db);
            // s'ha de pasar una imatge encara que no s'actualitzi. Creo
            // una variable buida per poderla pasar com argument
            $newImageName = '';
            // creem el nou article pasant-li tabe l'id i redireccionem
            if ($article->actualizar($idArticle, $titol, $newImageName, $text)) {
                $missatge = "Article actualitzat correctament";
                header("Location:articles.php?missatge=" . urlencode($missatge));
                // sortim del if else
                exit();
            } else {
                $error = "Error, no s'ha pogut actualitzar";
            }
        }
    } else {
        // en cas d'actualitzar tambe la imatge
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
            if ($article->actualizar($idArticle, $titol, $newImageName, $text)) {
                $missatge = "Article actualitzat correctament";
                header("Location:articles.php?missatge=" . urlencode($missatge));
            } else {
                $error = "Error, no s'ha pogut actualitzar";
            }
        }
    }
}

// CRUD - ESBORRAT DE L'ARTICLE
if (isset($_POST['borrarArticulo'])) {
    // instancio l'objecte article
    $article = new Article_model($db);
    // recullo el valor de l'id que ve del input ocult del formulari
    $idArticle = $_POST['id'];

    // creem el nou article i redireccionem
    if ($article->esborrar($idArticle)) {
        $missatge = "Article esborrat correctament";
        header("Location:articles.php?missatge=" . urlencode($missatge));
    } else {
        $error = "Error, no s'ha pogut esborrar";
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
        <h3>Editar l'Artícle</h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 offset-3">
        <!-- el formulari tindrà el enctype="multipart/form-data", ja que pujarem dades a la bbdd -->
        <form method="POST" action="" enctype="multipart/form-data">
            <!-- faig servir aquest input ocult per passar la id -->
            <input type="hidden" name="id" value="<?= $resultat->id ?>">

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