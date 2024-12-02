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
      

        <input type="submit" class="btn btn-success" value="Agregar">
        
        </form>
    
    </div>
    </div>
</div>