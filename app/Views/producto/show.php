<div class="container">

<div class="row">
    <div class="col">
        <h1 class="text-success"> Pasteles </h1>
        <a href="<?=base_url('producto/add/');?> " class="btn btn-outline-info">Agregar</a>
    </div>
</div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th class="text-primary">id </th>
                    <th class="text-primary">Nombre </th>
                    <th class="text-primary">Peso</th>
                    <th class="text-primary">Descripción</th>
                    <th class="text-primary">Precio</th>
                    <th class="text-primary">imagen</th>
                    <th class="text-primary">Disponibilidad</th>
                </thead>
                <tbody>
                    <?php foreach($producto as $key) : ?>
                        <tr>
                        <td><?=$key->idProducto; ?></td>
                        <td><?=$key->nombre; ?></td>
                        <td><?=$key->peso; ?></td>
                        <td><?=$key->descripción; ?></td>
                        <td><?=$key->precio; ?></td>
                        <td><?=$key->imagen; ?></td>
                        <td><?=$key->disponible; ?></td>
                        <td>
                            <a href="<?=base_url('producto/delete/'.$key->idProducto);?> " class="btn btn-outline-danger">Borrar</a>
                            <a href="<?=base_url('producto/edit/'.$key->idProducto);?> " class="btn btn-outline-success">Modificar</a>
                        
                        </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>