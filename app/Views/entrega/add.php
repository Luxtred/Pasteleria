<div class="container">
    <div class="row">
        <div class="col">

        <h2>Agregar Administrador</h2>
        
    <form action="<?=base_url('administrador/insert'); ?>" method="POST">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
        <div class="mb-3">
            <label for="administrador" class="form-label">Nombre</label>
            <input name="administrador" type="text" class="form-control" id="administrador" placeholder="">
        </div>
        <div class="mb-3">
            <label for="administrador" class="form-label">Apellido Paterno</label>
            <input name="administrador" type="text" class="form-control" id="administrador" placeholder="">
        </div>
        <div class="mb-3">
            <label for="administrador" class="form-label">Apellido Materno</label>
            <input name="administrador" type="text" class="form-control" id="administrador" placeholder="">
        </div>
        <div class="mb-3">
            <label for="administrador" class="form-label">Fecha de Nacimiento</label>
            <input name="administrador" type="text" class="form-control" id="administrador" placeholder="">
        </div>
        <div class="mb-3">
            <label for="administrador" class="form-label">CURP</label>
            <input name="administrador" type="text" class="form-control" id="administrador" placeholder="">
        </div>
        <div class="mb-3">
            <label for="administrador" class="form-label">Telefono</label>
            <input name="administrador" type="text" class="form-control" id="administrador" placeholder="">
        </div>
        <div class="mb-3">
            <label for="administrador" class="form-label">Email</label>
            <input name="administrador" type="text" class="form-control" id="Administrador" placeholder="" >
        </div>
        <input type="submit" class="btn btn-success" value="Agregar">
        </form>
    
    </div>
    </div>
</div>