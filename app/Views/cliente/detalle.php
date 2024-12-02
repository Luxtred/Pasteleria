<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promoción de Pasteles</title>
    <link rel="stylesheet" href="<?=base_url()?>detalle.css">
</head>
<body>
<!-- Contenido de la promoción -->
<div class="promo-container">
    <div class="content-container">
        <!-- Imagen basada en el ID de la promoción -->
        <div class="image-container">
            <?php 
            // Asociar imágenes a cada ID de promoción
            switch ($promocion->id_promocion) {
                case 1:
                    $imagen = '/pastelitos/promo1.png';
                    break;
                case 2:
                    $imagen = '/pastelitos/promo2.png';
                    break;
                case 3:
                    $imagen = '/pastelitos/promo3.png';
                    break;
                case 4:
                    $imagen = '/pastelitos/promo4.png';
                    break;
                case 5:
                    $imagen = '/pastelitos/promo5.png';
                    break;
                default:
                    $imagen = '/pastelitos/default.png'; // Imagen predeterminada
            }
            ?>
            <img src="<?= base_url($promocion->imagen ?? $imagen) ?>" alt="<?= esc($promocion->nombre) ?>">
        </div>

        <!-- Información -->
        <div class="text-container">
            <h1><?= esc($promocion->nombre) ?></h1>
            <p class="descripcion"><?= esc($promocion->descripcion) ?></p>
            
            <h2>Términos y condiciones</h2>
            <p class="terminos"><?= esc($promocion->terminos) ?></p>
            
            <button onclick="window.location.href='<?= site_url('/cliente/promociones') ?>'">
                <i class="bi bi-arrow-left"></i> Volver a Promociones
            </button>
        </div>
    </div>
</div>
</body>
</html>
