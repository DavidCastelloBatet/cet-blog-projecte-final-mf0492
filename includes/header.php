<?php include '../config/config.php' ?>
<?php include '../config/Basemysql.php' ?>
<?php include '../helpers/format_helper.php' ?>
<?php include '../models/Article_model.php' ?>
<?php include '../models/Comentari_model.php' ?>
<?php include '../models/Usuari_model.php' ?>

<!doctype html>
<html lang="ca">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/bootstrap-icons-1.2.1/font/bootstrap-icons.css">

    <!-- Datatables CSS -->
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css">

    <title>Cet Blog</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand logo" href="<?= RUTA_FRONT; ?>">CET Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administració
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="<?= RUTA_ADMIN; ?>articles.php">Articles</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= RUTA_ADMIN; ?>comentaris.php">Comentaris</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= RUTA_ADMIN; ?>usuaris.php">Usuaris</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= RUTA_FRONT; ?>">Inici</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= RUTA_FRONT; ?>registre.php">Registrar-se</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= RUTA_FRONT; ?>/accedir.php">Accedir</a>
                    </li>
                    <li class="nav-item">
                        <p class="text-white mt-2"><i class="bi bi-person-circle"></i></p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= RUTA_FRONT; ?>/sortir.php">Sortir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 caja">