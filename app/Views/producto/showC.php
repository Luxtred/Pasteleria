<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url()?>producto.css">
    <title>Tienda de Productos</title>
    <link rel="stylesheet" href="styles.css">
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
    <div class="product-section">
        <!-- Barra de búsqueda -->
        <div class="search-bar">
            <input type="text" placeholder="Buscar producto...">
        </div>

        <!-- Contenedor de productos -->
        <div class="product-grid">
            <div class="product-card">
                <img src="path/to/image1.jpg" alt="Tarta de chocolate">
                <p class="product-name">Tarta de Chocolate</p>
                <p class="product-price">$6.0</p>
            </div>
            <div class="product-card">
                <div class="placeholder-img"></div>
                <p class="product-name">Árabe Crema</p>
                <p class="product-price">$6.0</p>
            </div>
            <div class="product-card">
                <div class="placeholder-img"></div>
                <p class="product-name">Árabe Crema</p>
                <p class="product-price">$6.0</p>
            </div>
        </div>
    </div>
</body>
</html>
