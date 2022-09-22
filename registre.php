<?php include("includes/header_front.php") ?>

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