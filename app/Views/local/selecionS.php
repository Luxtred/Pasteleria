<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Sucursal</title>
    <link rel="stylesheet" href="<?= base_url() ?>selecionS.css">
</head>
<body>
    <div class="container">
        <h1>Selecciona tu Sucursal</h1>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        
        <!-- Mostrar las sucursales en un select -->
        <form method="post" action="<?= base_url('usuario/guardarSucursal') ?>">
            <label for="sucursal-select">Selecciona una sucursal:</label>
            <select name="idLocal" id="sucursal-select" required>
                <option value="">-- Selecciona una sucursal --</option>
                <?php foreach ($local as $sucursal): ?>
                    <option value="<?= $sucursal->idLocal ?>">
                        <?= $sucursal->nombreSucursal ?> 
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Confirmar</button>
        </form>

        <!-- Listar detalles de cada sucursal -->
        <div class="sucursal-list">
            <h2>Detalles de Sucursales</h2>
            <?php foreach ($local as $sucursal): ?>
                <div class="sucursal-item">
                    <h3><?= $sucursal->nombreSucursal ?></h3>
                    <p><strong>Dirección:</strong> <?= $sucursal->direccion ?></p>
                    <p><strong>Horario de Atención:</strong> <?= $sucursal->horaAtencion ?></p>
                    <p><strong>Teléfono:</strong> <?= $sucursal->telefono ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
