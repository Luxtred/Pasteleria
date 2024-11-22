<div class="container">
    <div class="row">
        <div class="col">

        <h2>Agregar Sucursales</h2>
        <?= validation_list_errors() ?>

    <form action="<?=base_url('local/insert'); ?>" method="POST">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
        <div class="mb-3">
            <label for="local" class="form-label">Sucursal</label>
            <input name="nombreSucursal" type="text" class="form-control" id="local" placeholder=""
            required
            placeholder="" value="<?= set_value('nombreSucursal') ?>">
        </div>
        <div class="mb-3">
            <label for="local" class="form-label">Direción</label>
            <input name="direccion" type="text" class="form-control" id="local" placeholder=""
            required
            placeholder="" value="<?= set_value('direccion') ?>">
        </div>
        <div class="mb-3">
            <label for="local" class="form-label">Horario</label>
            <input name="horaAtencion" type="text" class="form-control" id="local" placeholder=""
            required
            placeholder="" value="<?= set_value('horaAtencion') ?>">
        </div>
        <div class="mb-3">
            <label for="local" class="form-label">Gerente</label>
            <input name="nombreGerente" type="text" class="form-control" id="local" placeholder=""
            required
            placeholder="" value="<?= set_value('nombreGerente') ?>">
        </div>
        <div class="mb-3">
            <label for="local" class="form-label">Telefono</label>
            <input name="telefono" type="text" class="form-control" id="local" placeholder=""
            required
            placeholder="" value="<?= set_value('telefono') ?>">
        </div>
        <div class="mb-3">
            <label for="idImage" class="form-label">Imagen</label>
            <input name="idImage" type="hidden" class="form-control" id="idImage" 
            required
            placeholder="" value="<?= $lastImage ?>" readonly>
            <input type="num" class="form-control" value="<?= $lastImage ?>" disabled>
        </div>   

        <input type="submit" class="btn btn-success" value="Agregar">
        <a href="<?= base_url('image/add'); ?>" class="btn btn-success mt-3">Agregar Imagen</a>
        </form>
    
    </div>
    </div>
</div>