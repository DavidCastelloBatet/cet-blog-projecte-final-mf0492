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
$usuari = new Usuari_model($db);

// crido el metode de l'objecte i li paso la id de l'article rebuda per GET
$resultat = $usuari->llegir_individual($id);


?>

<div class="row">
    <div class="col-sm-6">
        <h3>Editar Usuari</h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 offset-3">
        <form method="POST" action="">

            <input type="hidden" name="id" value="<?= $resultat->usuario_id ?>">

            <div class="mb-3">
                <label for="nombre" class="form-label">Nom:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Posa el nom" value="<?= $resultat->usuario_nombre ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correu Electrònic:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Posa el correu electrònic" value="<?= $resultat->usuario_email ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol:</label>
                <select class="form-select" aria-label="Default select example" name="rol">
                    <!-- per defecte deixo seleccionat el rol que em torna la bbdd per l'usuari-->
                    <option value="">--Selecciona un rol--</option>
                    <option value="1" <?php if ($resultat->rol == "Administrador") {
                                            echo "selected";
                                        } ?>>Administrador</option>
                    <option value="2" <?php if ($resultat->rol == "Usuari Registrat") {
                                            echo "selected";
                                        } ?>>Usuari Registrat</option>

                </select>
            </div>

            <br />
            <button type="submit" name="editarUsuario" class="btn btn-success float-left"><i class="bi bi-person-bounding-box"></i> Editar Usuari</button>

            <button type="submit" name="borrarUsuario" class="btn btn-danger float-right"><i class="bi bi-person-bounding-box"></i> Esborrar Usuari</button>
        </form>
    </div>
</div>
<?php include("../includes/footer.php") ?>