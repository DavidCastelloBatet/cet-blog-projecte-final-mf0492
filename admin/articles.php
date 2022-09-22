<?php include("../includes/header.php") ?>


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

                <tr>
                    <td>1</td>
                    <td>test</td>
                    <td>
                        <img class="img/articulos/" style="width:180px;">
                    </td>
                    <td>test</td>
                    <td>test</td>
                    <td>
                        <a href="editar_articles.php" class="btn btn-warning"><i class="bi bi-pencil-fill"> Editar / Esborrar</i></a>
                    </td>
                </tr>

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