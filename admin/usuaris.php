<?php include("../includes/header.php") ?>
<?php

// instancio la base de dades i la conexio
$baseDades = new Basemysql();
$db = $baseDades->connect();

// instancio l'objecte Usuari_model
$usuaris = new Usuari_model($db);
$resultat = $usuaris->leer();

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

                <?php foreach ($resultat as $usuari) : ?>
                    <tr>
                        <td><?= $usuari->usuario_id ?></td>
                        <td><?= $usuari->usuario_nombre ?></td>
                        <td><?= $usuari->usuario_email ?></td>
                        <td><?= $usuari->rol ?></td>
                        <td><?= $usuari->usuario_fecha_creacion ?></td>
                        <td>
                            <a href="editar_usuari.php?id=<?= $usuari->usuario_id ?>" class="btn btn-warning"><i class="bi bi-pencil-fill"> Editar / Esborrar</i></a>
                        </td>
                    </tr>
                <?php endforeach ?>

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