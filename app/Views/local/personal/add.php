<div class="container">
    <div class="row">
        <div class="col">

        <h2>Agregar personal</h2>
        <?= validation_list_errors() ?>
        
    <form action="<?=base_url('personal/insert'); ?>" method="POST">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
        <div class="mb-3">
            <label for="personal" class="form-label">Matricula</label>
            <input name="matricula" type="text" class="form-control" id="idPersonal" 
            required
            placeholder="" value="<?= set_value('matricula') ?>">
        </div>
        <div class="mb-3">
            <label for="personal" class="form-label">Nombre</label>
            <input name="nombre" type="text" class="form-control" id="idPersonal" 
            required
            placeholder="" value="<?= set_value('nombre') ?>">
        </div>
        <div class="mb-3">
            <label for="personal" class="form-label">Apellido Paterno</label>
            <input name="apellidoPaterno" type="text" class="form-control" id="idPersonal" 
            required
            placeholder="" value="<?= set_value('apellidoPaterno') ?>">
        </div>
        <div class="mb-3">
            <label for="personal" class="form-label">Apellido Materno</label>
            <input name="apellidoMaterno" type="text" class="form-control" id="idPersonal" 
            required
            placeholder="" value="<?= set_value('apellidoMaterno') ?>">
        </div>
        <div class="mb-3">
            <label for="personal" class="form-label">Fecha de Nacimiento</label>
            <input name="fechaNacimiento" type="text" class="form-control" id="idPersonal"
            required
            placeholder="" value="<?= set_value('fechaNacimiento') ?>">
        </div>
        <div class="mb-3">
            <label for="personal" class="form-label">Genero</label>
            <input name="genero" type="text" class="form-control" id="idPersonal" 
            required
            placeholder="" value="<?= set_value('genero') ?>">
        </div>
        <div class="mb-3">
            <label for="personal" class="form-label">CURP</label>
            <input name="curp" type="text" class="form-control" id="idPersonal" 
            required
            placeholder="" value="<?= set_value('curp') ?>">
        </div>
        <div class="mb-3">
            <label for="personal" class="form-label">Email</label>
            <input name="email" type="text" class="form-control" id="idPersonal" 
            required
            placeholder="" value="<?= set_value('email') ?>">
        </div>
        <div class="mb-3">
            <label for="personal" class="form-label">Telefono</label>
            <input name="telefono" type="text" class="form-control" id="idPersonal" 
            required
            placeholder="" value="<?= set_value('telefono') ?>">
        </div>
        
        <input type="submit" class="btn btn-success" value="Agregar">
        </form>
    
    </div>
    </div>
</div>