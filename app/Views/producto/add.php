<div class="container">
    <div class="row">
        <div class="col">

        <h2>Agregar Pastel</h2>
        <?= validation_list_errors() ?>
        
    <form action="<?=base_url('producto/insert'); ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />   
   
    <div class="mb-3">
            <label for="producto" class="form-label">Nombre</label>
            <input name="nombre" type="text" class="form-control" id="producto" 
            required
            placeholder="" value="<?= set_value('nombre') ?>">
        </div>
        <div class="mb-3">
            <label for="producto" class="form-label">Peso</label>
            <input name="peso" type="text" class="form-control" id="producto" 
            required
            placeholder="" value="<?= set_value('peso') ?>">
        </div>
        <div class="mb-3">
            <label for="producto" class="form-label">Descripción</label>
            <input name="descripción" type="text" class="form-control" id="producto" 
            required
            placeholder="" value="<?= set_value('descripción') ?>">
        </div>
        <div class="mb-3">
            <label for="producto" class="form-label">Precio</label>
            <input name="precio" type="text" class="form-control" id="producto" 
            required
            placeholder="" value="<?= set_value('precio') ?>">
        </div>
        <div class="mb-3">
            <label for="producto" class="form-label">Imagen</label>
            <input name="imagen" type="text" class="form-control" id="producto" 
            required
            placeholder="" value="<?= set_value('imagen') ?>">
        </div>
        <div class="mb-3">
            <label for="idDisponible" class="form-label">Disponible</label>        
            <select name="idDisponible" class="form-control" >
                <?php foreach ($disponibles as $key ) :?>
                   <option value="<?=$key->idDisponible?>"><?=$key->disponible?></option>
                <?php endforeach ?>

            </select>
            </div>       
        
        <input type="submit" class="btn btn-success" value="Agregar">
        </form>
        </div>
    </div>
    </div>    
    
    
