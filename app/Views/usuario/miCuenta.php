<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="<?=base_url()?>micuenta.css">
</head>
<body>
    <div class="form-container">
        <h2>Crear mi cuenta</h2>
        <p>Por favor complete la siguiente información:</p>
        <form>
            <input type="text" placeholder="Nombre" required>
            <input type="text" placeholder="Apellidos" required>
            <input type="email" placeholder="Email" required>
            <input type="password" placeholder="Contraseña" required>
            <button type="submit">Crear Mi cuenta</button>
        </form>
    </div>
</body>
</html>
