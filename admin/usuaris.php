<?php include("../includes/header.php") ?>


<div class="row">
    <div class="col-sm-6">
        <h3>Llista d'Usuaris</h3>
    </div>
</div>
<div class="row mt-2 caja">
    <div class="col-sm-12">
        <table id="tblUsuarios" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Correu Electrònic</th>
                    <th>Rol</th>
                    <th>Data de Creació</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>4</td>
                    <td>juan garcía</td>
                    <td>juancgr@gmail.com</td>
                    <td>Registrado</td>
                    <td>2020-12-15</td>
                    <td>
                        <a href="editar_usuari.php" class="btn btn-warning"><i class="bi bi-pencil-fill"> Editar / Esborrar</i></a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
<?php include("../includes/footer.php") ?>

<!-- Script que dona format a la taula dels usuaris (Datatable) -->
<script>
    $(document).ready(function() {
        $('#tblUsuarios').DataTable();
    });
</script>