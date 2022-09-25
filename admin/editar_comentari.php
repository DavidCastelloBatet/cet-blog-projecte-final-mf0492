<!-- COMENTARIS - PENDENT D'IMPLEMENTAR-->

<?php include("../includes/header.php") ?>

<div class="row">

</div>

<div class="row">
    <div class="col-sm-6">
        <h3>Editar Comentari</h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 offset-3">
        <form method="POST" action="">

            <input type="hidden" name="id" value="4">

            <div class="mb-3">
                <label for="texto">Text</label>
                <textarea class="form-control" placeholder="Texto de l'artícle" name="texto" style="height: 200px" readonly>
                texto descripcion demo
                </textarea>
            </div>

            <div class="mb-3">
                <label for="usuario" class="form-label">Usuari:</label>
                <input type="text" class="form-control" value="juan@gmail.com" readonly>
            </div>

            <div class="mb-3">
                <label for="cambiarEstado" class="form-label">Cambiar estat:</label>
                <select class="form-select" name="cambiarEstado" aria-label="Default select example">
                    <option value="">--Selecciona una opció--</option>
                    <option value="1">Aprovat</option>
                    <option value="0">No Aprovat</option>
                </select>
            </div>

            <br />
            <button type="submit" name="editarComentario" class="btn btn-success float-left"><i class="bi bi-person-bounding-box"></i> Editar Comentari</button>

            <button type="submit" name="borrarComentario" class="btn btn-danger float-right"><i class="bi bi-person-bounding-box"></i> Esborrar Comentari</button>
        </form>
    </div>
</div>
<?php include("../includes/footer.php") ?>