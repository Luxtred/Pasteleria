<div class="container">

<div class="row">
    <div class="col">
        <h1> Personal </h1>
        <a href="<?=base_url('personal/add/');?> " class="btn btn-success">Agregar</a>
    </div>
</div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>id</th>
                    <th>Matricula </th>
                    <th>Nombre </th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Genero</th>
                    <th>CURP</th>
                    <th>Email</th>
                    <th>Telefono</th>                  
                </thead>
                <tbody>
                    <?php foreach($personal as $key) : ?>
                        <tr>
                        <td><?=$key->idPersonal ?></td>
                        <td><?=$key->matricula ?></td>
                        <td><?=$key->nombre ?></td>
                        <td><?=$key->apellidoPaterno ?></td>
                        <td><?=$key->apellidoMaterno ?></td>
                        <td><?=$key->fechaNacimiento ?></td>
                        <td><?=$key->genero ?></td>
                        <td><?=$key->curp ?></td>
                        <td><?=$key->email ?></td>
                        <td><?=$key->telefono ?></td>      

                        <td>
                            <a href="<?=base_url('personal/delete/'.$key->idPersonal);?> " class="btn btn-danger">Borrar</a>
                            <a href="<?=base_url('personal/edit/'.$key->idPersonal);?> " class="btn btn-warning">Actualizar</a>
                        
                        </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>