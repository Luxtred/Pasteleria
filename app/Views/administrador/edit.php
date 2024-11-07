<div class="container">
    <div class="row">
        <div class="col">

        <h2>Actualizar administrador</h2>
    <form action="<?=base_url('administrador/update/'); ?>" method="POST">
        <div class="mb-3">
            <label for="administrador" class="form-label">Nombre</label>
            <input name="nombre" type="text" value="<?=$administrador[0]->nombre; ?>"
                 class="form-control" id="idAdministrador" placeholder="">
           <input type="hidden" name="idAdministrador" value="<?=$administrador[0]->idAdministrador;?>" >
        </div>
        <div class="mb-3">
            <label for="administrador" class="form-label">Apellido Paterno</label>
            <input name="apellidoPaterno" type="text" value="<?=$administrador[0]->apellidoPaterno; ?>"
                 class="form-control" id="idAdministrador" placeholder="">
           <input type="hidden" name="idAdministrador" value="<?=$administrador[0]->idAdministrador;?>" >
        </div>
        <div class="mb-3">
            <label for="administrador" class="form-label">Apellido Materno</label>
            <input name="apellidoMaterno" type="text" value="<?=$administrador[0]->apellidoMaterno; ?>"
                 class="form-control" id="idAdministrador" placeholder="">
           <input type="hidden" name="idAdministrador" value="<?=$administrador[0]->idAdministrador;?>" >
        </div>
        <div class="mb-3">
            <label for="Administrador" class="form-label">Fecha de Nacimiento</label>
            <input name="fechaNacimiento" type="text" value="<?=$administrador[0]->fechaNacimiento; ?>"
                 class="form-control" id="idAdministrador" placeholder="">
           <input type="hidden" name="idAdministrador" value="<?=$administrador[0]->idAdministrador;?>" >
        </div>
        <div class="mb-3">
            <label for="Administrador" class="form-label">CURP</label>
            <input name="curp" type="text" value="<?=$administrador[0]->curp; ?>"
                 class="form-control" id="idAdministrador" placeholder="">
           <input type="hidden" name="idAdministrador" value="<?=$administrador[0]->idAdministrador;?>" >
        </div>
        <div class="mb-3">
            <label for="Administrador" class="form-label">Telefono</label>
            <input name="telefono" type="text" value="<?=$administrador[0]->telefono; ?>"
                 class="form-control" id="idAdministrador" placeholder="">
           <input type="hidden" name="idAdministrador" value="<?=$administrador[0]->idAdministrador;?>" >
        </div>
        <div class="mb-3">
            <label for="Administrador" class="form-label">Email</label>
            <input name="email" type="text" value="<?=$administrador[0]->email; ?>"
                 class="form-control" id="idAdministrador" placeholder="">
           <input type="hidden" name="idAdministrador" value="<?=$administrador[0]->idAdministrador;?>" >
        </div>
        <input type="submit" class="btn btn-success" name="Actualizar" value="Actualizar">
        </form>
    
    </div>
    </div>
</div>