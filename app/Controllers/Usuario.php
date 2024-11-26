<?php   

namespace App\Controllers;

class Usuario extends BaseController
{
    public function index(){
        return  view('head').
                
         view('usuario/login').
         view('footer');
       }

       public function acceder(){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
    
        $usuarioP = model('UsuarioP');
        $session = session();
    
        $result = $usuarioP->valida($usuario,$password);
        if(count($result)>0){
            
            $newdata = [
                'usuario'  => $result[0]->usuario,
                'tipo'     => $result[0]->tipo,
                'logged_in' => TRUE,
            ];
            
            $session->set($newdata);
            return redirect()->to(base_url('/menu'));
        }
        else{
            $session->destroy();
            return redirect()->to(base_url('/usuario'));
        }
       }
    
       public function salir(){
        $array_items = ['usuario', 'tipo','logged_in'];
        $session = session();
        $session->remove($array_items);
       
        return redirect()->to(base_url('/usuario'));
    
       }


}
