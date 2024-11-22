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
        
   
        
        <!-- Sección de Especialidad del Mes -->
        <div class="menu-item">
            <h2>ESPECIALIDAD DEL MES</h2>
            <div class="products">
                <div class="product">
                    <img src="imagen1.jpg" alt="">
                    <p>Pan de Muerto relleno de Membrillo Familiar</p>
                    <p>$100</p>
                    <button >Agregar</button>
                </div>
                <div class="product">
                    <img src="1731524684_80a807ed4d28c2d7703b.jpg" alt="Producto 2">
                    <p>Pastel de Queso con Zarzamora Mediano</p>
                    <p>$100</p>
                    <button>Agregar</button>
                </div>
                <div class="product">
                    <img src="imagen3.jpg" alt="Producto 3">
                    <p>Concha de Vainilla Familiar</p>
                    <p>$100</p>
                    <button>Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-section">
            <h2>LOS MÁS BUSCADOS</h2>
            <p>Eleva tu día con el pan y pasteles favoritos de nuestros invitados.</p>
            <button href="<?=base_url('/producto/showC');?>">VISITAR TIENDA</button>
        </div>
        <div class="product-grid">
            <?php
            // Llamada al modelo para obtener los productos más vistos
            $productoP = model('productoP');
            $productosMasVistos = $productoP->getProductosMasVistos();

            // Iteración a través de cada producto
            foreach ($productosMasVistos as $producto): ?>
                <div class="product">
                <?php if (!empty($producto->idImagen)) : ?>
                        <a href="<?= site_url('Imagen/getFile/' . $producto->idImagen) ?>" target="_blank">
                            <img src="<?= site_url('Imagen/getFile/' . $producto->idImagen) ?>" alt="" class="img-fluid">
                        </a>
                    <?php else: ?>
                        <p>No image available</p>
                    <?php endif; ?>
                    <h3><?= $producto->nombre ?></h3>
                    <p>Vistas: <?= $producto->vistas ?></p>
                    <p> <?=$producto->precio; ?> </p>
                    
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </body>
</html>