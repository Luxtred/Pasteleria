<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="<?=base_url()?>carrito.css">
</head>
<body>
    <div class="breadcrumb">
        <a href="#">Inicio</a> > <a href="#">Pasteles</a> > <span>Mi Carrito</span>
    </div>

    <h1 class="cart-title">Mi Carrito</h1>

    <div class="cart-container">
        <!-- Tabla del carrito -->
        <div class="cart-table">
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="product-info">
                            <img src="tiramisu.jpg" alt="Tiramisú Individual">
                            <div>
                                <p>Tiramisú Individual</p>
                                <p>$60</p>
                                <button class="remove-btn">Quitar</button>
                            </div>
                        </td>
                        <td class="quantity-cell">
                            <button class="quantity-btn">-</button>
                            <span class="quantity">1</span>
                            <button class="quantity-btn">+</button>
                        </td>
                        <td>$60</td>
                    </tr>
                </tbody>
            </table>
            <button class="continue-btn">Seguir Comprando</button>
        </div>

        <!-- Resumen del carrito -->
        <div class="cart-summary">
            <div class="summary-info">
                <p><strong>Total</strong> $60</p>
                <p><strong>Sucursal Puebla La Paz</strong></p>
                <p>
                    Local 2 Teziutlán Sur 19-a entre Tepeaca y Teziutlán Norte. Col. La Paz, Mpio. Puebla, CP 72160
                </p>
                <p>Lun a Dom de 07:00 a 19:00 hrs</p>
                <button class="change-branch">Cambiar Sucursal</button>
            </div>
            <button class="pay-btn">IR A PAGAR</button>
        </div>
    </div>
</body>
</html>
