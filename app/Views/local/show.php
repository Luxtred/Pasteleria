<div class="container">

<div class="row">
    <div class="col">
        <h1> Locales </h1>
        <a href="<?=base_url('local/add/');?> " class="btn btn-success">Agregar</a>
    </div>
</div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>id</th>
                    <th>Sucursal</th>
                    <th>Direción</th>
                    <th>Horario</th>
                    <th>Imagen</th>

                </thead>
                <tbody>
                    <?php foreach($local as $key) : ?>
                        <tr>
                        <td><?=$key->idLocal ?></td>
                        <td><?=$key->nombreSucursal ?></td>
                        <td><?=$key->direccion ?></td>
                        <td><?=$key->horaAtencion ?></td>
                        <td>
                            <?php if (!empty($key->idImage)) : ?>
                                <a href="<?= site_url('Imagen/getFile/' . $key->idImage) ?>" target="_blank">
                                <img src="<?= site_url('Imagen/getFile/' . $key->idImage) ?>" alt="" class="img-fluid">
                                    </a>
                                <?php else: ?>
                                    <p>No image available</p>
                                <?php endif; ?>
                            </td>
                                              
                        <td>
                            <a href="<?=base_url('local/delete/'.$key->idLocal);?> " class="btn btn-danger">Borrar</a>
                            <a href="<?=base_url('local/edit/'.$key->idLocal);?> " class="btn btn-warning">Actualizar</a>
                        
                        </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>