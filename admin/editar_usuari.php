<?php include("../includes/header.php") ?>


<div class="row">
    <div class="col-sm-6">
        <h3>Editar Usuari</h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 offset-3">
        <form method="POST" action="">

            <input type="hidden" name="id" value="8">

            <div class="mb-3">
                <label for="nombre" class="form-label">Nom:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Posa el nom" value="juan garcia" readonly>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correu Electrònic:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Posa el correu electrònic" value="juan@gmail.com" readonly>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol:</label>
                <select class="form-select" aria-label="Default select example" name="rol">
                    <option value="">--Selecciona un rol--</option>
                    <option value="1">Administrador</option>
                    <option value="2">Usuari Registrat</option>

                </select>
            </div>

            <br />
            <button type="submit" name="editarUsuario" class="btn btn-success float-left"><i class="bi bi-person-bounding-box"></i> Editar Usuari</button>

            <button type="submit" name="borrarUsuario" class="btn btn-danger float-right"><i class="bi bi-person-bounding-box"></i> Esborrar Usuari</button>
        </form>
    </div>
</div>
<?php include("../includes/footer.php") ?>