<?php

namespace App\Controllers;

class Producto extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];
      
    public function valida(){
        $session = session();
        $session->has('logged_in');
        
            if($session->has('logged_in')){
                return redirect()->to(base_url('/usuario'));
                
            }
        
        print_r($_SESSION);
    }

    public function index()
    {
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=2){
            return redirect()->to(base_url('/usuario'));
        }

        $productoP = productoP('ProductoP');

        $data['producto'] = $productoP->getProducto();
        return 
            view('head').
            view('menu').
            view('producto/show', $data).
            view('footer');   
    }

    public function add():string{
        $disponibleP = productoP('DisponibleP');
        $data['disponibles'] = $disponibleP->findAll();
        return 
            view('head').
            view('menu').
            view('producto/add',$data).
            view('footer');
    }

    public function edit($idProducto){
        $disponibleP = productoP('DisponibleP');
        $data['disponibles'] = $disponibleP->findAll();

        $idProducto = $data['idProducto'] = $idProducto;
        $productoP = productoP('ProductoP');
        $data['producto'] =$productoP->where('idProducto',$idProducto)->findAll();
        return 
        view('head').
        view('menu').
        view('producto/edit',$data).
        view('footer');
    }

    public function update(){
        $disponibleP = productoP('DisponibleP');
        $data['disponibles'] = $disponibleP->findAll();
        
        $productoP = productoP('ProductoP');
        $idProducto = $_POST['idProducto'];
        $data = [
                'nombre' => $_POST['nombre'],
                'peso' => $_POST['peso'],
                'descripción' => $_POST['descripción'],
                'precio' => $_POST['precio'],
                'imagen' => $_POST['imagen'],
                'idDisponible' => $_POST['idDisponible']
        ];
        $productoP->set($data)->where('idProducto',$idProducto)->update();
        return redirect()->to(base_url('/producto'));    
    }

    public function insert(){
        if (! $this->request->is('post')) {
            $this->index();
            }
    
            $rules = [
                'nombre' => 'required',
                'peso' => 'required',
                'descripción' => 'required',
                'precio' => 'required',
                'imagen' => 'required',
                'idDisponible' => 'required',
            ]; 
            $producto = [
                'nombre' => $_POST['nombre'],
                'peso' => $_POST['peso'],
                'descripción' => $_POST['descripción'],
                'precio' => $_POST['precio'],
                'imagen' => $_POST['imagen'],
                'idDisponible' => $_POST['idDisponible']
            ];
            if (! $this->validate($rules)) {
                // Si la validación falla, vuelve a cargar la vista con los errores
                return     
                view('head') .
                view('menu') . 
                view('producto/add',[
                    'validation' => $this->validator
                ]) .
                view('footer'); 
            }
            else{
                $productoP= productoP('ProductoP');
                $productoP->insert($producto);
                return redirect()->to(base_url('/producto'));
            }
            
            }
            

    public function delete($idProducto){
       
        $productoP = productoP('productoP');
        $productoP->delete($idProducto);
        return redirect()->to(base_url('/producto'));
    }
    
    public function ShowC(){
        $productoP = productoP('ProductoP');

        $data['producto'] = $productoP->getProducto();
        return 
            view('head').
            view('topMenu').
            view('producto/showc', $data).
            view('footer');  
    } 

    public function verProducto($idProducto) {
        $productoP = new ProductoP();
        
        // Llama al método para incrementar las vistas
        $productoP->incrementarVistasProducto($idProducto);
        
        // Luego, obtén la información del producto para mostrarla en la vista
        $producto = $productoP->getProductoById($idProducto);
        
        return view('/principal', ['producto' => $producto]);
    }
    
    }
    
