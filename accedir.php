<?php include("includes/header_front.php") ?>


<?php
session_start();
// instancio la base de dades i la conexio
$baseDades = new Basemysql();
$db = $baseDades->connect();

// instanciem l'objecte usuari
$usuari = new Usuari_model($db);

if (isset($_POST['acceder'])) {
    //Obtenim els valors que arriven del formulari
    $email = $_POST['email'];
    $password = $_POST['password'];

    // validacions
    if (empty($email) || $email == '' || empty($password) || $password == '') {
        $error = "Alguns camps estan buits";
    } else {
        if ($usuari->accedir($email, $password)) {
            $_SESSION['autenticat'] = true;
            $_SESSION['email'] = $email;

            echo ("<script>location.href = '" . RUTA_FRONT . "'</script>");
        } else {
            $error = "No s'ha pogut accedit, dades incorrectes";
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

<div class="container-fluid">
    <h1 class="text-center">Accés d'Usuaris</h1>
    <div class="row">
        <div class="col-sm-6 offset-3">
            <div class="card">
                <div class="card-header">
                    Escriu les teves dades per Accedir
                </div>
                <div class="card-body">
                    <form method="POST" action="">

                        <div class="mb-3">
                            <label for="email" class="form-label">Correu Electrònic:</label>
                            <input type="email" class="form-control" name="email" placeholder="Posa el teu mail">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Escriu el teu password">
                        </div>

                        <br />
                        <button type="submit" name="acceder" class="btn btn-primary w-100"><i class="bi bi-person-bounding-box"></i> Accedir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include("includes/footer.php") ?>