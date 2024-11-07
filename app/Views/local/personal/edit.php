<div class="container">
    <div class="row">
        <div class="col">

        <h2>Actualizar Personal</h2>
    <form action="<?=base_url('personal/update/'); ?>" method="POST">
        <div class="mb-3">
            <label for="personal" class="form-label">Matricula</label>
            <input name="matricula" type="text" value="<?=$personal[0]->matricula; ?>"
                 class="form-control" id="idPersonal" placeholder="">
           <input type="hidden" name="idPersonal" value="<?=$personal[0]->idPersonal;?>" >
        </div>
        <div class="mb-3">
            <label for="personal" class="form-label">Nombre</label>
            <input name="nombre" type="text" value="<?=$personal[0]->nombre; ?>"
                 class="form-control" id="idPersonal" placeholder="">
           <input type="hidden" name="idPersonal" value="<?=$personal[0]->idPersonal;?>" >
        </div>
        <div class="mb-3">
            <label for="personal" class="form-label">Apellido Paterno</label>
            <input name="apellidoPaterno" type="text" value="<?=$personal[0]->apellidoPaterno; ?>"
                 class="form-control" id="idPersonal" placeholder="">
           <input type="hidden" name="idPersonal" value="<?=$personal[0]->idPersonal;?>" >
        </div>
        <div class="mb-3">
            <label for="personal" class="form-label">Apellido Materno</label>
            <input name="apellidoMaterno" type="text" value="<?=$personal[0]->apellidoMaterno; ?>"
                 class="form-control" id="idPersonal" placeholder="">
           <input type="hidden" name="idPersonal" value="<?=$personal[0]->idPersonal;?>" >
        </div>
        <div class="mb-3">
            <label for="personal" class="form-label">Fecha de Nacimiento</label>
            <input name="fechaNacimiento" type="text" value="<?=$personal[0]->fechaNacimiento; ?>"
                 class="form-control" id="idPersonal" placeholder="">
           <input type="hidden" name="idPersonal" value="<?=$personal[0]->idPersonal;?>" >
        </div>
        <div class="mb-3">
            <label for="personal" class="form-label">Genero</label>
            <input name="genero" type="text" value="<?=$personal[0]->genero; ?>"
                 class="form-control" id="idPersonal" placeholder="">
           <input type="hidden" name="idPersonal" value="<?=$personal[0]->idPersonal;?>" >
        </div>
        <div class="mb-3">
            <label for="personal" class="form-label">CURP</label>
            <input name="curp" type="text" value="<?=$personal[0]->curp; ?>"
                 class="form-control" id="idPersonal" placeholder="">
           <input type="hidden" name="idPersonal" value="<?=$personal[0]->idPersonal;?>" >
        </div> 
        <div class="mb-3">
            <label for="personal" class="form-label">Email</label>
            <input name="email" type="text" value="<?=$personal[0]->email; ?>"
                 class="form-control" id="idPersonal" placeholder="">
           <input type="hidden" name="idPersonal" value="<?=$personal[0]->idPersonal;?>" >
        </div>
        <div class="mb-3">
            <label for="personal" class="form-label">Telefono</label>
            <input name="telefono" type="text" value="<?=$personal[0]->telefono; ?>"
                 class="form-control" id="idPersonal" placeholder="">
           <input type="hidden" name="idPersonal" value="<?=$personal[0]->idPersonal;?>" >
        </div>
        <input type="submit" class="btn btn-success" name="Actualizar" value="Actualizar">
        </form>
    
    </div>
    </div>
</div>