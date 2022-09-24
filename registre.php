<?php include("includes/header_front.php") ?>
<?php

// instancio la base de dades i la conexio
$baseDades = new Basemysql();
$db = $baseDades->connect();

// CRUD - CREACIO / REGISTRE D'USUARI

if (isset($_POST['registrarse'])) {
    //Obtenim els valors que arriven del formulari
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmarPassword = $_POST['confirmar_password'];

    // validacions
    if (empty($nombre) || $nombre == '' || empty($email) || $email == '' || empty($password) || $password == '' || empty($confirmarPassword) || $confirmarPassword == '') {
        $error = "Alguns camps estan buits";
    } else {

        // Validar que els passwords coincideixen
        if ($password != $confirmarPassword) {
            $error = "Error, el passwords i la confirmació no coincideixen";
        } else {
            // instanciem l'objecte usuari
            $usuari = new Usuari_model($db);

            if ($usuari->validar_email($email)) {
                // Creem l'usuari registrat
                if ($usuari->registrar($nombre, $email, $password)) {
                    $missatge = "T'has registrat correctament";
                } else {
                    $error = "No s'ha pogut registrar a l'usuari";
                }
            } else {
                $error = "Error, aquest email ya esta registrat";
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


<!-- missatge d'error -->
<div class="row">
    <div class="col-sm-12">
        <?php if (isset($missatge)) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= $missatge; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- final missatge d'error -->

<div class="container-fluid">
    <h1 class="text-center">Registre d'Usuaris</h1>
    <div class="row">
        <div class="col-sm-6 offset-3">
            <div class="card">
                <div class="card-header">
                    Regístra't per comentar
                </div>
                <div class="card-body">
                    <form method="POST" action="">

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nom:</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Posa el nombre">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correu Electrònic:</label>
                            <input type="email" class="form-control" name="email" placeholder="Posa el correu electrònic">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Posa el password">
                        </div>

                        <div class="mb-3">
                            <label for="confirmarPassword" class="form-label">Confirma el password:</label>
                            <input type="password" class="form-control" name="confirmar_password" placeholder="Torna a posar el password">
                        </div>

                        <br />
                        <button type="submit" name="registrarse" class="btn btn-primary w-100"><i class="bi bi-person-bounding-box"></i> Registrar-se</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include("includes/footer.php") ?>