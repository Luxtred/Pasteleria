<div class="container">
    <div class="row">
        <div class="col">

        <h2>Actualizar Local</h2>
    <form action="<?=base_url('local/update/'); ?>" method="POST">
        <div class="mb-3">
            <label for="local" class="form-label">Sucursal</label>
            <input name="nombreSucursal" type="text" value="<?=$local[0]->nombreSucursal; ?>"
                 class="form-control" id="idLocal" placeholder="">
           <input type="hidden" name="idLocal" value="<?=$local[0]->idLocal;?>" >
        </div>
        <div class="mb-3">
            <label for="local" class="form-label">Dirección</label>
            <input name="direccion" type="text" value="<?=$local[0]->direccion; ?>"
                 class="form-control" id="idLocal" placeholder="">
           <input type="hidden" name="idLocal" value="<?=$local[0]->idLocal;?>" >
        </div>
        <div class="mb-3">
            <label for="local" class="form-label">Horario</label>
            <input name="horaAtencion" type="text" value="<?=$local[0]->horaAtencion; ?>"
                 class="form-control" id="idLocal" placeholder="">
           <input type="hidden" name="idLocal" value="<?=$local[0]->idLocal;?>" >
        </div>
        <div class="mb-3">
            <label for="local" class="form-label">Gerente</label>
            <input name="nombreGerente" type="text" value="<?=$local[0]->nombreGerente; ?>"
                 class="form-control" id="idLocal" placeholder="">
           <input type="hidden" name="idLocal" value="<?=$local[0]->idLocal;?>" >
        </div>
        <div class="mb-3">
            <label for="local" class="form-label">Telefono</label>
            <input name="telefono" type="text" value="<?=$local[0]->telefono; ?>"
                 class="form-control" id="idLocal" placeholder="">
           <input type="hidden" name="idLocal" value="<?=$local[0]->idLocal;?>" >
        </div>
        <input type="submit" class="btn btn-success" name="Actualizar" value="Actualizar">
        </form>
    
    </div>
    </div>
</div>