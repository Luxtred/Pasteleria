<div class="container">

<div class="row">
    <div class="col">
        <h1> Administrador </h1>
        <a href="<?=base_url('administrador/add/');?> " class="btn btn-success">Agregar</a>
    </div>
</div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>idAdministrador</th>
                    <th>Nombre </th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Fecha de Nacimiento</th>
                    <th>CURP</th>
                    <th>Telefono</th>
                    <th>Email</th>
                </thead>
                <tbody>
                    <?php foreach($administrador as $key) : ?>
                        <tr>
                        <td><?=$key->idAdministrador ?></td>
                        <td><?=$key->nombre ?></td>
                        <td><?=$key->apellidoPaterno ?></td>
                        <td><?=$key->apellidoMaterno ?></td>
                        <td><?=$key->fechaNacimiento ?></td>
                        <td><?=$key->curp ?></td>
                        <td><?=$key->telefono ?></td>
                        <td><?=$key->email ?></td>

                        <td>
                            <a href="<?=base_url('administrador/delete/'.$key->idAdministrador);?> " class="btn btn-danger">Borrar</a>
                            <a href="<?=base_url('administrador/edit/'.$key->idAdministrador);?> " class="btn btn-warning">Modificar</a>
                        
                        </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>