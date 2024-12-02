<div class="container">
    <div class="row">
        <div class="col">

        <h2>Actualizar Producto</h2>
    <form action="<?=base_url('producto/update/'); ?>" method="POST">
        <div class="mb-3">
            <label for="producto" class="form-label">Nombre</label>
            <input name="nombre" type="text" value="<?=$producto[0]->nombre; ?>"
                 class="form-control" id="idProducto" placeholder="">
           <input type="hidden" name="idProducto" value="<?=$producto[0]->idProducto;?>" >
        </div>
        <div class="mb-3">
            <label for="producto" class="form-label">Peso</label>
            <input name="peso" type="text" value="<?=$producto[0]->peso; ?>"
                 class="form-control" id="idProducto" placeholder="">
           <input type="hidden" name="idProducto" value="<?=$producto[0]->idProducto;?>" >
        </div>
        <div class="mb-3">
            <label for="producto" class="form-label">Descripción</label>
            <input name="descripción" type="text" value="<?=$producto[0]->descripción; ?>"
                 class="form-control" id="idProducto" placeholder="">
           <input type="hidden" name="idProducto" value="<?=$producto[0]->idProducto;?>" >
        </div>
        <div class="mb-3">
            <label for="producto" class="form-label">Precio</label>
            <input name="precio" type="text" value="<?=$producto[0]->precio; ?>"
                 class="form-control" id="idProducto" placeholder="">
           <input type="hidden" name="idProducto" value="<?=$producto[0]->idProducto;?>" >
        </div>
        <div class="mb-3">
            <label for="idImagen" class="form-label">Imagen</label>
            <input name="idImagen" type="hidden" class="form-control" id="idImagen" 
            required
            placeholder="" value="<?= $lastImagen ?>" readonly>
            <input type="num" class="form-control" value="<?= $lastImagen ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="idDisponible" class="form-label">Disponible</label>
            <select name="idDisponible" class="form-control" >
                <?php foreach ($disponibles as $key ) :?>
                   <option value="<?=$key->idDisponible?>"><?=$key->disponible?></option>
                <?php endforeach ?>
                </select>
        </div> 
        <div class="mb-3">
            <label for="idCategoria" class="form-label">Categoria</label>
            <select name="idCategoria" class="form-control" >
                <?php foreach ($categorias as $key ) :?>
                   <option value="<?=$key->idCategoria?>"><?=$key->categoria?></option>
                <?php endforeach ?>
                </select>
        </div> 

        <input type="submit" class="btn btn-outline-primary" name="Guardar" value="Guardar">

        <a href="<?= base_url('imagen/edit_image'); ?>" class="btn btn-success mt-3">Agregar Imagen</a>
        </form>
    
    </div>
    </div>
</div>