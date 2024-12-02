<?php   

namespace App\Controllers;

class Usuario extends BaseController
{
    public function index(){
        return view('head') .
               view('usuario/login') .
               view('footer');
    }

    public function acceder()
{
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $usuarioP = model('UsuarioP');
    $session = session();

    // Valida el usuario y la contraseña
    $usuario = $usuarioP->valida($email, $password);

    if ($usuario) {
        // La contraseña es correcta, inicia la sesión
        $newdata = [
            'idUsuario' => $usuario->idUsuario, // Almacena el idUsuario
            'email'     => $usuario->email,
            'tipo'      => $usuario->tipo,
            'logged_in' => TRUE,
        ];

        $session->set($newdata);
        
        // Redirigir según el tipo de usuario
        if ($usuario->tipo == 1) {
            return redirect()->to(base_url('/menu')); // Administrador
        } else {
            return redirect()->to(base_url('/topMenu')); // Cliente
        }
    } else {
        // Usuario no encontrado o contraseña incorrecta
        $session->setFlashdata('error', 'Email o contraseña incorrectos');
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
            // Debugging
            var_dump($validation->getErrors());
            return view('head') . 
            view('usuario/miCuenta', ['validation' => $validation]) . 
            view('footer');
        } else {
            $usuarioP = model('UsuarioP');
            $data = [
                'nombre'    => $this->request->getPost('nombre'),
                'apellido'  => $this->request->getPost('apellido'),
                'email'     => $this->request->getPost('email'),
                'password'  => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'tipo'      => 2,
            ];
            
            // Intentar insertar en la base de datos
            if ($usuarioP->insert($data) === false) {
                // Manejo de errores
                $session = session();
                $session->setFlashdata('error', 'Error al registrar el usuario: ' . $usuarioP->errors());
                return redirect()->to(base_url('/usuario/miCuenta'));
            }
    
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

    public function guardarSucursal() {
        $idLocal = $this->request->getPost('idLocal');
        
        $localP = model('LocalP');
        $sucursalSeleccionada = $localP->find($idLocal);
    
        if ($sucursalSeleccionada) {
            // Guardar los detalles de la sucursal en la sesión
            session()->set('idLocal', $sucursalSeleccionada->idLocal);
            session()->set('sucursalSeleccionada', $sucursalSeleccionada);
            return redirect()->to('producto/verCarrito')->with('success', 'Sucursal seleccionada correctamente.');
        } else {
            return redirect()->back()->with('error', 'Sucursal no encontrada.');
        }
    }
}