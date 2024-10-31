<?php

namespace App\Controllers;

class Personal extends BaseController
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

        $personalP = model('PersonalP');

        $data['personal'] = $personalP->findAll();
        return 
            view('head').
            view('menu').
            view('personal/show', $data).
            view('footer');   
    }

    public function add(){
        return 
            view('head').
            view('menu').
            view('personal/add').
            view('footer');
    }

    public function edit($idPersonal){
        $idPersonal = $data['idPersonal'] = $idPersonal;
        $personalP = model('PersonalP');
        $data['personal'] =$personalP->where('idPersonal',$idPersonal)->findAll();
        return 
        view('head').
        view('menu').
        view('personal/edit',$data).
        view('footer');
    }

    public function update(){
        $personalP = model('PersonalP');
        $idPersonal = $_POST['idPersonal'];
        $data = [
            'matricula' => $_POST['matricula'],
            'nombre' => $_POST['nombre'],
            'apellidoPaterno' => $_POST['apellidoPaterno'],
            'apellidoMaterno' => $_POST['apellidoMaterno'],
            'fechaNacimiento' => $_POST['fechaNacimiento'],
            'genero' => $_POST['genero'],
            'curp' => $_POST['curp'],
            'email' => $_POST['email'],
            'telefono' => $_POST['telefono']
        ];
        $personalP->set($data)->where('idPersonal',$idPersonal)->update();
        return redirect()->to(base_url('/personal'));    
    }

    public function insert(){
        if (! $this->request->is('post')) {
            $this->index();
            }   
            $rules = [
                'matricula' => 'required',
                'nombre' => 'required',
                'apellidoPaterno' => 'required',
                'apellidoMaterno' => 'required',
                'fechaNacimiento' => 'required',
                'genero' => 'required',
                'curp' => 'required',
                'email' => 'required',
                'telefono' => 'required',
            ];
        $personal = [
            'matricula' => $_POST['matricula'],
            'nombre' => $_POST['nombre'],
            'apellidoPaterno' => $_POST['apellidoPaterno'],
            'apellidoMaterno' => $_POST['apellidoMaterno'],
            'fechaNacimiento' => $_POST['fechaNacimiento'],
            'genero' => $_POST['genero'],
            'curp' => $_POST['curp'],
            'email' => $_POST['email'],
            'telefono' => $_POST['telefono']
        ];
        if (! $this->validate($rules)) {
            // Si la validación falla, vuelve a cargar la vista con los errores
            return     
            view('head') .
            view('menu') . 
            view('administrador/add',[
                'validation' => $this->validator
            ]) .
            view('footer'); 
        }
        else{
            $personalP= model('PersonalP');
            $personalP->insert($personal);
            return redirect()->to(base_url('/personal'));
        }
       
        }

    public function delete($idPersonal){
       
        $personalP = model('personalP');
        $personalP->delete($idPersonal);
        return redirect()->to(base_url('/personal'));
    }
}