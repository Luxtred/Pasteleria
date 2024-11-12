<?php   

namespace App\Controllers;

class Usuario extends BaseController
{
    public function index(){
        return view('head') .
               view('usuario/login') .
               view('footer');
    }

    public function acceder(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $usuarioP = model('UsuarioP');
        $session = session();

        // Supongo que la función valida ahora debería buscar por email y password en lugar de usuario y password
        $result = $usuarioP->valida($email, $password);
        if (count($result) > 0) {
            $newdata = [
                'email'     => $result[0]->email,  // Almacena el email en la sesión
                'tipo'      => $result[0]->tipo,
                'logged_in' => TRUE,
            ];

            $session->set($newdata);
            return redirect()->to(base_url('/menu'));
        } else {
            $session->destroy();
            return redirect()->to(base_url('/usuario'));
        }
    }

    public function salir(){
        $array_items = ['email', 'tipo', 'logged_in'];  // Cambia 'usuario' por 'email'
        $session = session();
        $session->remove($array_items);

        return redirect()->to(base_url('/usuario'));
    }
    // Nueva función para cargar la vista de creación de cuenta
    public function micuenta(){
        return view('head') .
               view('/usuario/miCuenta') .
               view('footer');
    }

    // Nueva función para registrar un usuario
    public function registrarUsuario(){
        $validation = \Config\Services::validation();

        // Reglas de validación
        $validation->setRules([
            'nombre'   => 'required',
            'apellido' => 'required',
            'email'    => 'required|valid_email|is_unique[usuario.email]',
            'password' => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Si la validación falla, recargar la vista con errores
            return view('head') . 
            view('usuario/miCuenta', ['validation' => $validation]) . 
            view('footer');
        } else {
            // Si la validación es exitosa, guardar los datos en la base de datos

            $usuarioP = model('UsuarioP');
            $data = [
                'nombre'    => $this->request->getPost('nombre'),
                'apellido'  => $this->request->getPost('apellido'),
                'email'     => $this->request->getPost('email'),
                'password'  => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'tipo'      => 2, // Asigna automáticamente el tipo 2 (cliente)
            ];
            $usuarioP->insert($data);

            // Redirigir a una página de éxito
            return redirect()->to(base_url('/topMenu'));
        }
    }

    // Función para mostrar la vista de registro exitoso
    public function registroExitoso(){
        return 
        view('head') .
        view('/topMenu') . 
        view('footer');
    }
}