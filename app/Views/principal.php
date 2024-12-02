<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url()?>principal.css">
    
    <title>Pastelería ZZZ</title>
    <body>
    <html>

    
 <!-- Contenedor principal del menú -->
 <div class="menu">
    <!-- Banner decorativo -->
    <div class="banner-menu">
        <div class="banner-content">
            <h1>Bienvenidos a Nuestra Pastelería</h1>
            <p>Explora nuestra selección de panes y postres únicos</p>
            <p></p>
            <a class="button1" href="<?=base_url('/producto/showC');?>">Ver más</a>
        </div>
    </div>
    
 <div class="menu">
 
<!-- Sección Especialidades -->
<div class="container">
    <div class="text-section">
        <h2>Especialidades del Mes</h2>
        <p>Disfruta de nuestras especialidades destacadas este mes.</p>
    </div>
    <div class="especialidades-grid"> <!-- Cambié a clase especialidades-grid -->
        <?php
        $productoP = model('productoP');
        $especialidadDelMes = $productoP->where('idCategoria', 2)->findAll();

        foreach ($especialidadDelMes as $producto):
        ?>
        <div class="especialidad-product"> <!-- Cambié a clase especialidad-product -->
            <?php if (!empty($producto->idImagen)) : ?>
                <a href="<?= site_url('Imagen/getFile/' . $producto->idImagen) ?>" target="_blank">
                    <img src="<?= site_url('Imagen/getFile/' . $producto->idImagen) ?>" alt="" class="img-fluid">
                </a>
            <?php else: ?>
                <p>No image available</p>
            <?php endif; ?>
            <h3><?= $producto->nombre ?></h3>
            <p>$<?= $producto->precio ?></p>
            <button>Agregar</button>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Sección Productos Más Vistos -->
<div class="container">
    <div class="text-section">
        <h2>LOS MÁS BUSCADOS</h2>
        <p>Eleva tu día con el pan y pasteles favoritos de nuestros invitados.</p>
        <button href="<?=base_url('/producto/showC');?>">VISITAR TIENDA</button>
    </div>
    <div class="productos-grid"> <!-- Cambié a clase productos-grid -->
        <?php
        $productoP = model('productoP');
        $productosMasVistos = $productoP->getProductosMasVistos();

        foreach ($productosMasVistos as $producto):
        ?>
        <div class="producto-item"> <!-- Cambié a clase producto-item -->
            <?php if (!empty($producto->idImagen)) : ?>
                <a href="<?= site_url('Imagen/getFile/' . $producto->idImagen) ?>" target="_blank">
                    <img src="<?= site_url('Imagen/getFile/' . $producto->idImagen) ?>" alt="" class="img-fluid">
                </a>
            <?php else: ?>
                <p>No image available</p>
            <?php endif; ?>
            <h3><?= $producto->nombre ?></h3>
            <p>$<?= $producto->precio ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>

    </body>
</html>