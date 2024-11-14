<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url()?>producto.css">
    <title>Tienda de Productos</title>
    
</head>
<body>
    <!-- Banner superior -->
    <div class="banner">
        <div class="banner-content">
            <div class="banner-text">
                <p>ORDENA EN LÍNEA</p>
                <span>➡</span>
                <p>RECOGE EN TIENDA</p>
            </div>
        </div>
    </div>

    <!-- Sección de categorías -->
    <div class="categories">
        <button class="category-btn active">Todos</button>
        <button class="category-btn">Bebidas</button>
        <button class="category-btn">Especial del Mes</button>
        <button class="category-btn">Gelatinas</button>
        <button class="category-btn">Helados</button>
        <button class="category-btn">Panadería</button>
        <button class="category-btn">Pasteles</button>
    </div>

    <!-- Sección de productos -->
    <!-- Sección de productos -->
    <div class="product-section">
        <!-- Barra de búsqueda -->
        <div class="search-bar">
            <input type="text" placeholder="Buscar producto...">
        </div>

        <!-- Contenedor de productos -->
        <div class="product-grid">
            <?php foreach ($producto as $producto): ?>
            <div class="product-card">
                <div class="imgSecundaria">
                    <?php if (!empty($producto->idImagen)) : ?>
                        <a href="<?= site_url('Imagen/getFile/' . $producto->idImagen) ?>" target="_blank">
                            <img src="<?= site_url('Imagen/getFile/' . $producto->idImagen) ?>" alt="" class="img-fluid">
                        </a>
                    <?php else: ?>
                        <p>No image available</p>
                    <?php endif; ?>
                </div>
                <p class="product-name"><?= esc($producto->nombre) ?></p>
                <p class="product-price"><?= esc($producto->precio) ?> $</p>
                <a href="" class="btn btn-primary">
                    <i class="bi bi-cart-fill"></i> Agregar
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
        </div>
    </div>
</body>
</html>
