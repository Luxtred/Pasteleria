<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promociones - Pastelería</title>
    <link rel="stylesheet" href="<?= base_url() ?>promocion.css">
</head>
<body>
    <!-- Banner -->
    <section class="banner">
        <h1>Promociones</h1>
    </section>

    <section class="products-container">
    <?php if (!empty($promociones)): ?>
        <?php foreach ($promociones as $index => $promo): ?>
            <div class="product">
                <!-- Asignamos diferentes imágenes dinámicamente dependiendo del índice -->
                <div>
                    <img src="/pastelitos/promo<?= ($index % 5) + 1 ?>.png" alt="Promoción <?= esc($promo->nombre) ?>">
                    <h2><?= esc($promo->nombre) ?></h2>
                    <button onclick="window.location.href='<?= base_url('/cliente/detalle/' . $promo->id_promocion) ?>'">Ver Detalles</button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay promociones disponibles en este momento.</p>
    <?php endif; ?>
    </section>

</body>
</html>

