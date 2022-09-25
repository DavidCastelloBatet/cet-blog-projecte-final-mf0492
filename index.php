<?php include("includes/header_front.php") ?>
<?php

// instancio la base de dades i la conexio
$baseDades = new Basemysql();
$db = $baseDades->connect();

// instancio l'objecte Article_model
$articles = new Article_model($db);
$resultat = $articles->leer();

?>

<div class="container-fluid">
    <h1 class="text-center">Articles</h1>
    <div class="row">
        <?php foreach ($resultat as $article) : ?>
            <div class="col-sm-4">
                <article>
                    <div class="card">
                        <img height="300px" src="<?= RUTA_FRONT ?>img/articulos/<?= $article->imagen ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $article->titulo ?></h5>
                            <p><strong><?= formatData($article->fecha_creacion) ?></strong></p>
                            <p class="card-text"><?= textCurt($article->texto, 80) ?></p>
                            <a href="detall.php?id=<?= $article->id ?>" class="btn btn-primary">Veure mes</a>
                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?php include("includes/footer.php") ?>