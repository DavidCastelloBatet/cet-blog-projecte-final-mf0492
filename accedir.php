<?php include("includes/header_front.php") ?>

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