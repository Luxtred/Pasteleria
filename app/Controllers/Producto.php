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

        $productoP = Model('ProductoP');
        $data['producto'] = $productoP->getImagenProducto();
        $data['producto'] = $productoP->getImagenProducto();

        $data['producto'] = $productoP->getProducto();
        return 
            view('head').
            view('menu').
            view('producto/show', $data).
            view('footer');   
    }

    public function add():string{
        $disponibleP = Model('DisponibleP');
        $data['disponibles'] = $disponibleP->findAll();
         // Se obtiene el id de la imagen que se agrego

         $db = \Config\Database::connect();
         $builder = $db->table('imagen');
         $builder->selectMax('idImagen');
         $query = $builder->get();
         $lastImagen = $query->getRow();
         $data['lastImagen'] = $lastImagen->idImagen ?? null;

        $data['disponibles'] = $disponibleP->findAll();
        return 
            view('head').
            view('menu').
            view('producto/add',$data).
            view('footer');
    }

    public function edit($idProducto){
        $disponibleP = Model('DisponibleP');
        $data['disponibles'] = $disponibleP->findAll();

        $db = \Config\Database::connect();
        $builder = $db->table('imagen');
        $builde = $db->table('imagen');
        $builder->selectMax('idImagen');
        $query = $builder->get();
        $lastImagen = $query->getRow();
        $data['lastImagen'] = $lastImagen->idImagen ?? null;

        $idProducto = $data['idProducto'] = $idProducto;
        $productoP = model('ProductoP');
        $data['producto'] =$productoP->where('idProducto',$idProducto)->findAll();
        return 
        view('head').
        view('menu').
        view('producto/edit',$data).
        view('footer');
    }

    public function update(){
        $disponibleP = Model('DisponibleP');
        $data['disponibles'] = $disponibleP->findAll();

        

        $disponibleP = Model('DisponibleP');
        $data['disponibles'] = $disponibleP->findAll();

        $db = \Config\Database::connect();
        $builder = $db->table('imagen');
        $builder->selectMax('idImagen');
        $query = $builder->get();
        $lastImagen = $query->getRow();
        $data['lastImagen'] = $lastImagen->idImagen ?? null;
        
        $productoP = Model('ProductoP');
        $idProducto = $_POST['idProducto'];
        $data = [
                'nombre' => $_POST['nombre'],
                'peso' => $_POST['peso'],
                'descripción' => $_POST['descripción'],
                'precio' => $_POST['precio'],
                'idImagen' => $_POST['idImagen'],
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
                'idImagen' => 'required',
                'idDisponible' => 'required',
            ]; 
            $producto = [
                'nombre' => $_POST['nombre'],
                'peso' => $_POST['peso'],
                'descripción' => $_POST['descripción'],
                'precio' => $_POST['precio'],
                'idImagen' => $_POST['idImagen'],
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
                $productoP= Model('ProductoP');
                $productoP->insert($producto);
                return redirect()->to(base_url('/producto'));
            }
            
            }
            

    public function delete($idProducto){
       
        $productoP = model('productoP');
        $productoP->delete($idProducto);
        return redirect()->to(base_url('/producto'));
    }
    
    public function ShowC(){
        $productoP = model('ProductoP');


        $data['producto'] = $productoP->getPompom();
        return 
            view('head').
            view('topMenu').
            view('producto/showc', $data).
            view('footer');  
    } 

    public function verProducto($idProducto) {
        $productoP = model ('ProductoP');
        
        // Llama al método para incrementar las vistas
        $productoP->incrementarVistasProducto($idProducto);
        
        // Luego, obtén la información del producto para mostrarla en la vista
        $producto = $productoP->getProductoById($idProducto);
        
        return view('/principal', ['producto' => $producto]);
    }

    public function Ver()
    {
       
        $productoP = model('ProductoP');
        $data['producto'] = $productoP->getImagenProducto();
        return view('/producto') ;
            //view('Cliente/Vista', $data);
    }
    public function verPastel($idProducto)
    {
        $productoP = model('ProductoP');
        $data['producto'] = $productoP->getImagenProducto1($idProducto); // Filtra por idConsultorio en el método del modelo
        return view('/topMenu') .
               view('producto/showC', $data);
    }
    
    }
    
