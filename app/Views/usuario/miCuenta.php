<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="<?=base_url()?>micuenta.css">
    </head>
<body>
    <div class="main-container">
        <div class="form-container">
            <h2>Crear mi cuenta</h2>
            <p>Por favor complete la siguiente información:</p>
            <form action="<?= base_url('usuario/registrarUsuario'); ?>" method="POST">
                <input type="text" placeholder="Nombre" name="nombre" required>
                <input type="text" placeholder="Apellidos" name="apellido" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Contraseña" name="password" required>
                <button type="submit">Crear Mi cuenta</button>
            </form>
        </div>
        <div class="image-container">
            <img src="/pastelitos/image.png" alt="Pasteles decorativos">
        </div>
    </div>
</body>
</html>
