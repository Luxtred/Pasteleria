<?php

namespace App\Controllers;

class Local extends BaseController
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
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/usuario'));
        }

        $localP = model('LocalP');


        $data['local'] = $localP->findAll();
        return 
            view('head').
            view('menu').
            view('local/show', $data).
            view('footer');   
    }

    public function add(){
    
        $localP = model('LocalP');
        $data['local'] = $localP->findAll();
        return 
            view('head').
            view('menu').
            view('local/add', $data).
            view('footer');
    }

    public function edit($idLocal){
        $idLocal = $data['idLocal'] = $idLocal;
        $localP = model('LocalP');
        $data['local'] =$localP->where('idLocal',$idLocal)->findAll();
        return 
        view('head').
        view('menu').
        view('local/edit',$data).
        view('footer');
    }

    public function update(){
        $localP = model('LocalP');
        $idLocal = $_POST['idLocal'];



        $data = [
            'nombreSucursal' => $_POST['nombreSucursal'],
            'direccion' => $_POST['direccion'],
            'horaAtencion' => $_POST['horaAtencion'],
            'nombreGerente' => $_POST['nombreGerente'],
            'telefono' => $_POST['telefono'],
            'idImage' => $_POST['idImage']
        ];
        $localP->set($data)->where('idLocal',$idLocal)->update();
        return redirect()->to(base_url('/local'));    
    }

    public function insert(){
        if (! $this->request->is('post')) {
            $this->index();
            }   
            $rules = [
                'nombreSucursal' => 'required',
                'direccion' => 'required',
                'horaAtencion' => 'required',
                'nombreGerente' => 'required',
                'telefono' => 'required'
              
            ];
        $local = [
            'nombreSucursal' => $_POST['nombreSucursal'],
            'direccion' => $_POST['direccion'],
            'horaAtencion' => $_POST['horaAtencion'],
            'nombreGerente' => $_POST['nombreGerente'],
            'telefono' => $_POST['telefono']
           
        ];
        if (! $this->validate($rules)) {
            return     
            view('head') .
            view('menu') . 
            view('local/add',[
                'validation' => $this->validator
            ]) .
            view('footer'); 
        }
        else{
            $localP= model('LocalP');
            $localP->insert($local);
            return redirect()->to(base_url('/local'));
        }
        
        }

    public function delete($idLocal){
       
        $localP = model('localP');
        $localP->delete($idLocal);
        return redirect()->to(base_url('/local'));
    }

    public function Sucursal()
    {
        $localP = model('LocalP');

        $data['local'] = $localP->findAll();
        return 
            view('head').
            view('topMenu').
            view('local/sucursal', $data).
            view('footer');   
    }

    
    public function mostrarSucursales()
    {
        $localP = model('LocalP');
        
        // Obtener todas las sucursales
        $data['local'] = $localP->findAll();

        // Cargar la vista seleccionS con los datos de las sucursales
        return view('head') .
            view('topMenu') .
            view('local/selecionS', $data) .
            view('footer');
    }
    
}