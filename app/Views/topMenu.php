<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url()?>principal.css">
    <link href="<?=base_url('/principal');?> ">
    <title>Pastelería ZZZ</title>

    <div class="main-content">
      
      
<!-- Barra Más Arriba -->
<div class="BarraMasArriba">
    <div class="SeleccionaSucursal">Selecciona Sucursal</div>
    <div class="Recoger">Recoger</div>
</div>  
<!-- Barra de Navegación -->
<nav class="BarraDeArriba">

        <a class="PasteleriaZzz" href="/topMenu">Pastelería ZZZ</a>
    
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
            <ul class="navbar-nav">
                <li class="Sucursales">
                    <a class="nav-link Sucursales" href="/local/sucursal">Sucursales</a>
                </li>
                <li class="Promociones">
                    <a class="nav-link Promociones" href="/promociones">Promociones</a>
                </li>
                <li class="LoNuevo">
                    <a class="nav-link LoNuevo" href="/lo-nuevo">Lo Nuevo</a>
                </li>
                <li class="OrdenaAqui">
                    <a class="nav-link OrdenaAqui" href="/ordena-aqui">Ordena Aquí</a>
                </li>
            </ul>
     <!-- Iconos -->
     <div class="icon-container">
            <!-- Icono de lupa -->
            <div class="icon search-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#D4A4FF" stroke-width="2">
                    <circle cx="10" cy="10" r="7"></circle>
                    <line x1="14" y1="14" x2="20" y2="20"></line>
                </svg>
            </div>

            <!-- Icono de usuario -->
            <a href="/usuario" class="icon user-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#5C3C6F" stroke-width="2">
                <circle cx="12" cy="8" r="4"></circle>
                <path d="M16 20c-1.33-2-4.67-2-6 0"></path>
            </svg>
            </a>

            <!-- Icono de carrito de compras -->
            <div class="icon cart-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#A020F0" stroke-width="2">
                    <circle cx="9" cy="20" r="2"></circle>
                    <circle cx="16" cy="20" r="2"></circle>
                    <path d="M5 4h16l-1.34 5.34A3 3 0 0 1 16.79 12H8.21a3 3 0 0 1-2.87-2.66L4 4"></path>
                </svg>
                <div class="cart-badge">0</div>
            </div>
        </div>
    </nav>
</nav>

</div>


</body>
</html>

