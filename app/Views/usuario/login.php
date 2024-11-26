<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="<?=base_url()?>cuenta.css">
    <title>Iniciar Sesión</title>
</head>
<body>
<div class="container mt-5">  
    <div class="row justify-content-center">
        <div class="col-md-6 login-container">
            <h2 class="text-center mb-4">Conectar a mi cuenta</h2>
            <p class="text-center">Ingresar e-mail y contraseña</p>
            <form action="<?=base_url('usuario/acceder'); ?>" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control input-style" id="usuario" name="usuario" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control input-style" id="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-purple btn-block">
                    <i class="fas fa-birthday-cake"></i> Iniciar Sesión
                </button>
            </form>
            <div class="text-center mt-3">
                <span>¿Nuevo Cliente?</span>
                <a href="/usuario/micuenta" class="register-link">Crear Cuenta</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
