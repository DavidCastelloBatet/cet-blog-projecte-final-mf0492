<!-- PENDENT D'IMPLEMENTAR!!!!!-->

<?php include("../includes/header.php") ?>

<div class="row">
    <div class="col-sm-6">
        <h3>Llista de Comentaris</h3>
    </div>
</div>
<div class="row mt-2 caja">
    <div class="col-sm-12">
        <table id="tblContactos" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Comentari</th>
                    <th>Usuari</th>
                    <th>Artícle</th>
                    <th>Estat</th>
                    <th>Data de creació</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>4</td>
                    <td>texto comentario</td>
                    <td>juuan4@gmail.com</td>
                    <td>titulo artículo</td>
                    <td>pendiente</td>
                    <td>2020-11-12</td>
                    <td>
                        <a href="editar_comentari.php" class="btn btn-warning"><i class="bi bi-pencil-fill"> Editar / Esborrar</i></a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
<?php include("../includes/footer.php") ?>

<!-- Script que dona format a la taula dels comentaris (Datatable) -->
<script>
    $(document).ready(function() {
        $('#tblContactos').DataTable();
    });
</script>