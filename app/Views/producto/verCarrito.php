<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compra</title>
    <link rel="stylesheet" href="<?= base_url() ?>carrito.css">
    <script>
        function validarSucursal() {
            const sucursalSelect = document.getElementById('sucursal-select');
            if (sucursalSelect.value === "") {
                alert("Por favor, selecciona una sucursal de entrega antes de proceder al pago.");
                return false; // Evita el envío del formulario
            }
            return true; // Permite el envío del formulario
        }
    </script>
</head>
<body>
<div class="carrito-container">
    <h1>Mi Carrito</h1>
    
    <?php if (!empty($session->get('carrito'))) : ?>
        <?php $totalGeneral = 0; ?>
        <?php foreach ($session->get('carrito') as $index => $item) : ?>
            <div class="carrito-item" data-index="<?= $index ?>">
                <div class="item-detalle">
                    <?php if (!empty($item['idImagen'])) : ?>
                        <img src="<?= site_url('Imagen/getFile/' . $item['idImagen']) ?>" alt="<?= esc($item['nombre']) ?>">
                    <?php else : ?>
                        <p>No hay imagen disponible</p>
                    <?php endif; ?>
                    <div class="item-info">
                        <h2><?= esc($item['nombre']) ?></h2>
                        <p>$<span class="precio-unitario"><?= esc($item['precio']) ?></span></p>
                    </div>
                </div>
                <div class="item-cantidad">
                    <button class="btn-cantidad disminuir" data-index="<?= $index ?>">-</button>
                    <span class="cantidad"><?= esc($item['cantidad']) ?></span>
                    <button class="btn-cantidad aumentar" data-index="<?= $index ?>">+</button>
                    <button class="btn-quitar" data-index="<?= $index ?>">Quitar</button>
                </div>
                <div class="item-total">
                    <p data-precio="<?= esc($item['precio']) ?>">$<span class="subtotal"><?= esc($item['subtotal']) ?></span></p>
                </div> 
            </div>
            <?php $totalGeneral += $item['subtotal']; ?>
        <?php endforeach; ?>
        <div class="total-general">
            <h3>Total: $<span id="totalGeneral"><?= number_format($totalGeneral, 2) ?></span></h3>
        </div>
    <?php else : ?>
        <p>No hay productos en el carrito.</p>
    <?php endif; ?>

    <div class="container">
        <div class="total">
            <span>Total</span>
            <span>$<?= number_format($totalGeneral, 2) ?></span>
        </div>
        <hr>
        
        <div class="acciones-carrito">
            <button class="btn-seguir-comprando" onclick="window.location.href = '<?= base_url('/producto/showC') ?>';">Seguir Comprando</button>
            <button class="btn-seguir-comprando" onclick="window.location.href = '<?= base_url('usuario/procesarPago') ?>';">Ir a Pagar</button>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const carritoContainer = document.querySelector('.carrito-container');
    const totalGeneralElement = document.getElementById('totalGeneral');

    // Actualizar total general
    const actualizarTotalGeneral = () => {
        let totalGeneral = 0;
        document.querySelectorAll('.subtotal').forEach(subtotal => {
            totalGeneral += parseFloat(subtotal.textContent);
        });
        totalGeneralElement.textContent = totalGeneral.toFixed(2);
    };

    // Petición al servidor
    const enviarPeticionServidor = async (url, datos) => {
        try {
            const respuesta = await fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(datos),
            });
            const resultado = await respuesta.json();
            if (!resultado.success) {
                console.error('Error en la respuesta del servidor:', resultado.message);
            }
            return resultado;
        } catch (error) {
            console.error('Error al comunicarse con el servidor:', error);
        }
    };

    // Delegación de eventos
    carritoContainer.addEventListener('click', async (event) => {
        const itemElement = event.target.closest('.carrito-item');
        if (!itemElement) return;

        const index = itemElement.dataset.index;
        const cantidadElement = itemElement.querySelector('.cantidad');
        const precioUnitario = parseFloat(itemElement.querySelector('.precio-unitario').textContent);
        const subtotalElement = itemElement.querySelector('.subtotal');

        if (event.target.classList.contains('aumentar') || event.target.classList.contains('disminuir')) {
            let cantidad = parseInt(cantidadElement.textContent, 10);

            if (event.target.classList.contains('aumentar')) {
                cantidad++;
            } else if (cantidad > 1) {
                cantidad--;
            } else {
                return; // Evita disminuir por debajo de 1
            }

            cantidadElement.textContent = cantidad;
            subtotalElement.textContent = (precioUnitario * cantidad).toFixed(2);

            actualizarTotalGeneral();
            await enviarPeticionServidor('<?= base_url('producto/actualizarCantidad') ?>', { index, cantidad });
        }

        if (event.target.classList.contains('btn-quitar')) {
            const subtotal = parseFloat(subtotalElement.textContent);
            itemElement.remove();
            actualizarTotalGeneral();
            await enviarPeticionServidor('<?= base_url('producto/eliminarProducto') ?>', { index });
        }
    });
});
</script>