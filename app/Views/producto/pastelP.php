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
            <div class="price">$<?= esc($producto->precio) ?></div>

            <form action="<?= base_url('/producto/insertCarrito') ?>" method="POST">
                <input type="hidden" name="idProducto" value="<?= esc($producto->idProducto) ?>">
                <input type="hidden" name="nombre" value="<?= esc($producto->nombre) ?>">
                <input type="hidden" name="precio" value="<?= esc($producto->precio) ?>">
                <input type="hidden" name="idImagen" value="<?= esc($producto->idImagen) ?>">
                
                <div class="quantity-selector">
                    <button type="button" class="quantity-btn decrease">-</button>
                    <span class="quantity">1</span>
                    <input type="hidden" name="cantidad" value="1" class="quantity-input">
                    <button type="button" class="quantity-btn increase">+</button>
                </div>
                
                <div class="buttons">
                    <button type="submit" class="add-to-cart">Agregar</button>
                    <button type="submit" class="add-to-cart">Comprar</button>
                </div>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const quantitySelector = document.querySelector('.quantity-selector');
                    const quantitySpan = quantitySelector.querySelector('.quantity');
                    const quantityInput = quantitySelector.querySelector('.quantity-input');
                    const decreaseBtn = quantitySelector.querySelector('.decrease');
                    const increaseBtn = quantitySelector.querySelector('.increase');

                    increaseBtn.addEventListener('click', () => {
                        let quantity = parseInt(quantitySpan.textContent, 10);
                        quantity++;
                        quantitySpan.textContent = quantity;
                        quantityInput.value = quantity; // Actualiza el valor del input oculto
                    });

                    decreaseBtn.addEventListener('click', () => {
                        let quantity = parseInt(quantitySpan.textContent, 10);
                        if (quantity > 1) {
                            quantity--;
                            quantitySpan.textContent = quantity;
                            quantityInput.value = quantity; // Actualiza el valor del input oculto
                        }
                    });
                });
            </script>
            
</body>
</html>
