<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url()?>principal.css">
    <link href="<?=base_url('/topMenu');?> ">
    <title>Pastelería ZZZ</title>
    <body>
    <html>
 <!-- Contenedor principal del menú -->
 <div class="menu">
        
        <!-- Sección de Panes de Alta Calidad -->
        <div class="menu-item">
            <h2>PANES DE ALTA CALIDAD</h2>
            <p>Conoce nuestros deliciosos panes</p>
            <button>Ver más</button>
        </div>
        
        <!-- Sección de Especialidad del Mes -->
        <div class="menu-item">
            <h2>ESPECIALIDAD DEL MES</h2>
            <div class="products">
                <div class="product">
                    <img src="imagen1.jpg" alt="Producto 1">
                    <p>Pan de Muerto relleno de Membrillo Familiar</p>
                    <p>$100</p>
                    <button>Agregar</button>
                </div>
                <div class="product">
                    <img src="imagen2.jpg" alt="Producto 2">
                    <p>Pastel de Queso con Zarzamora Mediano</p>
                    <p>$100</p>
                    <button>Agregar</button>
                </div>
                <div class="product">
                    <img src="imagen3.jpg" alt="Producto 3">
                    <p>Concha de Vainilla Familiar</p>
                    <p>$100</p>
                    <button>Agregar</button>
                </div>
            </div>
        </div>

    </div>
    </body>
</html>