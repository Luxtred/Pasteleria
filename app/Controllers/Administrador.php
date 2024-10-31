<?php

namespace App\Controllers;

class Administrador extends BaseController
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

        $administradorA = model('AdministradorA');

        $data['administrador'] = $administradorA->findAll();
        return 
            view('head').
            view('menu').
            view('administrador/show', $data).
            view('footer');   
    }

    public function add(){
        return 
            view('head').
            view('menu').
            view('administrador/add').
            view('footer');
    }

    public function edit($idAdministrador){
        $idAdminstrador = $data['idAdministrador'] = $idAdministrador;
        $administradorA = model('AdministradorA');
        $data['administrador'] =$administradorA->where('idAdministrador',$idAdministrador)->findAll();
        return 
        view('head').
        view('menu').
        view('administrador/edit',$data).
        view('footer');
    }

    public function update(){
        $administradorA = model('AdministradorA');
        $idAdministrador = $_POST['idAdministrador'];
        $data = [
                'nombre' => $_POST['nombre'],
                'apellidoPaterno' => $_POST['apellidoPaterno'],
                'apellidoMaterno' => $_POST['apellidoMaterno'],
                'fechaNacimiento' => $_POST['fechaNacimiento'],
                'curp' => $_POST['curp'],
                'telefono' => $_POST['telefono'],
                'email' => $_POST['email']
        ];
        $administradorA->set($data)->where('idAdministrador',$idAdministrador)->update();
        return redirect()->to(base_url('/administrador'));    
    }

    public function insert(){
        if (! $this->request->is('post')) {
            $this->index();
            }
            $rules = [
                'nombre' => 'required',
                'apellidoPaterno' => 'required',
                'apellidoMaterno' => 'required',
                'fechaNacimiento' => 'required',
                'curp' => 'required',
                'telefono' => 'required',
                'email' => 'required'
            ];
            $administrador = [
                'nombre' => $_POST['nombre'],
                'apellidoPaterno' => $_POST['apellidoPaterno'],
                'apellidoMaterno' => $_POST['apellidoMaterno'],
                'fechaNacimiento' => $_POST['fechaNacimiento'],
                'curp' => $_POST['curp'],
                'telefono' => $_POST['telefono'],
                'email' => $_POST['email']
            ];
            if (! $this->validate($rules)) {
                return     
                view('head') .
                view('menu') . 
                view('administrador/add',[
                    'validation' => $this->validator
                ]) .
                view('footer'); 
            }
            else{
                $administradorA = model('AdministradorA');
                $administradorA->insert($administrador);
                return redirect()->to(base_url('/administrador'));
            }
         
        }

        

        public function delete($idAdministrador){
       
            $administradorA = model('administradorA');
            $administradorA->delete($idAdministrador);
            return redirect()->to(base_url('/administrador'));
        }
}