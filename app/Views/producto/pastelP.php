<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pastelito</title>
    <link rel="stylesheet" href="<?=base_url()?>pastelito.css">
</head>
<body>
    <div class="product-card">
        <div class="image-container">
            <?php if (!empty($producto->idImagen)) : ?>
                <img src="<?= site_url('Imagen/getFile/' . $producto->idImagen) ?>" alt="<?= esc($producto->nombre) ?>">
            <?php else : ?>
                <p>No hay imagen disponible</p>
            <?php endif; ?>
        </div>
        <div class="product-info">
            <h1><?= esc($producto->nombre) ?></h1>
            <p><?= esc($producto->descripción) ?></p>
            <div class="price"><?= esc($producto->precio) ?></div>

            <div class="quantity-selector">
                <button class="quantity-btn">-</button>
                <span class="quantity">1</span>
                <button class="quantity-btn">+</button>
            </div>
            <div class="buttons">
                <button class="add-to-cart">Agregar</button>
                <button class="buy-now">Comprar ahora</button>
            </div>
        </div>
    </div>
</body>
</html>
