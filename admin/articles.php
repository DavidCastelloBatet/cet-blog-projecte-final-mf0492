<?php include("../includes/header.php") ?>

<?php

// instancio la base de dades i la conexio
$baseDades = new Basemysql();
$db = $baseDades->connect();

// instancio l'objecte Article_model
$articles = new Article_model($db);
$resultat = $articles->leer();

?>

<!-- missatge d'ok -->
<div class="row">
    <div class="col-sm-12">
        <?php if (isset($_GET['missatge'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= $_GET['missatge']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- final missatge d'ok -->


<div class="row">
    <div class="col-sm-6">
        <h3>Llista d'Articles</h3>
    </div>
    <div class="col-sm-4 offset-2">
        <a href="crear_article.php" class="btn btn-success w-100"><i class="bi bi-plus-circle-fill"></i> Nou Article</a>
    </div>
</div>
<div class="row mt-2 caja">
    <div class="col-sm-12">
        <table id="tblArticulos" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Títol</th>
                    <th>Imatge</th>
                    <th>Texte</th>
                    <th>Data de creació</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($resultat as $article) : ?>
                    <tr>
                        <td><?= $article->id ?></td>
                        <td><?= $article->titulo ?></td>
                        <td>
                            <img class="img-fluid" src="<?= RUTA_FRONT . 'img/articulos/' . $article->imagen; ?>" style="width:180px;">
                        </td>
                        <td><?= textCurt($article->texto, 200) ?></td>
                        <td><?= $article->fecha_creacion ?></td>
                        <td>
                            <!-- quan es clica, es pasa la id de l'article -->
                            <a href="editar_articles.php?id=<?= $article->id; ?>" class="btn btn-warning"><i class="bi bi-pencil-fill"> Editar / Esborrar</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
<?php include("../includes/footer.php") ?>

<!-- Script que dona format a la taula dels articles(Datatable) -->
<script>
    $(document).ready(function() {
        $('#tblArticulos').DataTable();
    });
</script>