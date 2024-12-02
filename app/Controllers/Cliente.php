<?php

namespace App\Controllers;

class Cliente extends BaseController
{
    public function index(): string
    {
        return view('/cliente');
    }

    public function Promociones()
    {
    // Carga el modelo de promociones
    $promocionesP = model('PromocionesP');
    
    // Obtén las promociones desde la base de datos
    $data['promociones'] = $promocionesP->findAll();
    
    // Carga las vistas, pasando los datos
    return 
        view('head').
        view('topMenu').
        view('cliente/promociones', $data). // Pasa los datos a la vista
        view('footer');  
    }
    

   
    public function Detalle($id_promocion){
        $clienteP = model('ClienteP');
        $promocionesP = model('PromocionesP');
    
        // Obtener los detalles de la promoción usando el ID
        $data['promocion'] = $promocionesP->find($id_promocion);
    
        return 
            view('head').
            view('topMenu').
            view('cliente/detalle', $data).
            view('footer');  
    }

    public function Nuevo(){
        
    
        return 
            view('head').
            view('topMenu').
            view('cliente/nuevo').
            view('footer');  
    }
}