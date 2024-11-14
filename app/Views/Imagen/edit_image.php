
<div class="container">
    <div class="row">
        <div class="col">

            <h2>Actualizar Imagen</h2>
            <?= validation_list_errors() ?>

            <?= form_open_multipart('imagen/update/' . $fileRecord['id']) ?>
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

            <div class="mb-3">
                <label for="imagen">Imagen Actual</label>
                <div>
                    <?php if (!empty($fileRecord['nombreDelArchivo'])): ?>
                        <img src="<?= base_url('uploads/' . $fileRecord['nombreDelArchivo']) ?>" alt="Imagen actual" style="width:200px; height:auto;">
                    <?php else: ?>
                        <p>No hay imagen disponible</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="imagen">Seleccionar Nueva Imagen</label>
                <input type="file" class="form-control" name="imagen" required>
            </div>

            <input type="submit" class="btn btn-success mt-3" value="Actualizar Imagen">

            <?= form_close() ?>

        </div>
    </div>
</div>
