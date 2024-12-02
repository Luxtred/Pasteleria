<?php

namespace App\Controllers;

class Producto extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    // Método para verificar si el usuario ha iniciado sesión
    protected function checkLogin() {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to(base_url('/usuario')); // Redirige a la página de inicio de sesión
        }
    }
    // Método para verificar si el usuario tiene permisos de administrador
    protected function checkAdmin() {
        $session = session();
        if ($session->get('tipo') != 1) {
            return redirect()->to(base_url('/usuario')); // Redirige si no es administrador
        }
    }

    public function index()
    {
        $this->checkAdmin(); // Verifica si es administrador
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/usuario'));
        }

        $productoP = Model('ProductoP');
        
        $data['producto'] = $productoP->getImagenProducto();
        $data['producto'] = $productoP->getProducto();


        return 
            view('head').
            view('menu').
            view('producto/show', $data).
            view('footer');   
    }

    public function add():string{
        $this->checkAdmin(); // Verifica si es administrador
        $disponibleP = Model('DisponibleP');
        $data['disponibles'] = $disponibleP->findAll();

        $categoriaP = Model('CategoriaP');
        $data['categorias'] = $categoriaP->findAll();
         // Se obtiene el id de la imagen que se agrego

         $db = \Config\Database::connect();
         $builder = $db->table('imagen');
         $builder->selectMax('idImagen');
         $query = $builder->get();
         $lastImagen = $query->getRow();
         $data['lastImagen'] = $lastImagen->idImagen ?? null;
        return 
            view('head').
            view('menu').
            view('producto/add',$data).
            view('footer');
    }

    public function edit($idProducto){
        $this->checkAdmin(); // Verifica si es administrador
        $disponibleP = Model('DisponibleP');
        $data['disponibles'] = $disponibleP->findAll();

        $categoriaP = Model('CategoriaP');
        $data['categorias'] = $categoriaP->findAll();

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
        $this->checkAdmin(); // Verifica si es administrador
        $categoriaP = Model('CategoriaP');
        $data['categorias'] = $categoriaP->findAll();

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
                'idDisponible' => $_POST['idDisponible'],
                'idCategoria' => $_POST['idCategoria']
        ];
        $productoP->set($data)->where('idProducto',$idProducto)->update();
        return redirect()->to(base_url('/producto'));    
    }

    public function insert(){
        $this->checkAdmin(); // Verifica si es administrador
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
                'idCategoria' => 'required',
            ]; 
            $producto = [
                'nombre' => $_POST['nombre'],
                'peso' => $_POST['peso'],
                'descripción' => $_POST['descripción'],
                'precio' => $_POST['precio'],
                'idImagen' => $_POST['idImagen'],
                'idDisponible' => $_POST['idDisponible'],
                'idCategoria' => $_POST['idCategoria']
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
        $this->checkAdmin(); // Verifica si es administrador
        $productoP = model('productoP');
        $productoP->delete($idProducto);
        return redirect()->to(base_url('/producto'));
    }
    
    public function ShowC(){
        $productoP = model('ProductoP');
        $categoriaP = Model('CategoriaP');

        $data['producto'] = $productoP->getPompom();
        $data['categorias'] = $categoriaP->findAll();
        return 
            view('head').
            view('topMenu').
            view('producto/showc', $data).
            view('footer');  
    } 

    
    public function pastelP($idProducto) {
        $productoP = model('ProductoP');
        $data['producto'] = $productoP->find($idProducto); // Obtén el producto específico por ID
    
        return view('head') .
               view('topMenu') .
               view('producto/pastelP', $data) .
               view('footer');
    }
    

    public function mostrarMasVistos() {
        $productoP = model('ProductoP');
        $productosMasVistos = $productoP->getProductosMasVistos();
    
        return view('/principal', [
            'productosMasVistos' => $productosMasVistos,
        ]);
    }

    public function verProducto($idProducto) {
        $productoP = model ('ProductoP');
        
        // Llama al método para incrementar las vistas
        $productoP->incrementarVistasProducto($idProducto);
        
        // Luego, obtén la información del producto para mostrarla en la vista
        $producto = $productoP->getProductoById($idProducto);
        
        return 
        view('/principal', 
        ['producto' => $producto]);
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
    
    public function getProductosPorCategoria($idCategoria = null) {
        $productoP = model('ProductoP');
        $categoriaP = model('CategoriaP');
        
        if ($idCategoria) {
            $productos = $productoP->where('idCategoria', $idCategoria)->findAll();
        } else {
            $productos = $productoP->findAll(); // Si no se pasa categoría, obtener todos los productos
        }
    
        // Retorna los productos en formato JSON para la respuesta AJAX
        return $this->response->setJSON($productos);
    }

    public function verCarrito() {
        $this->checkLogin(); // Verifica si el usuario ha iniciado sesión
    
        $session = session(); // Obtiene la sesión actual
        $data['session'] = $session; // Pasa la sesión a la vista
    
        // Obtener las sucursales desde el modelo
        $localP= model('LocalP');// Asegúrate de que el modelo esté correctamente definido
        $data['local'] = $localP->findAll(); // Obtener todas las sucursales
    
        // Obtener la sucursal seleccionada por el usuario
        $idLocalSeleccionado = $session->get('idLocal'); // Asumiendo que guardas el idLocal en la sesión
        if ($idLocalSeleccionado) {
            $data['local'] = $localP->find($idLocalSeleccionado); // Obtener los detalles de la sucursal
        }
    
        return view('head') .
               view('topMenu', $data) . // Asegúrate de que el menú superior reciba la sesión
               view('producto/verCarrito', $data); // Carga la vista para ver el carrito
    }
    

    public function insertCarrito() {
        $this->checkLogin(); // Verifica si el usuario ha iniciado sesión

        $session = session();  // Obtiene la sesión activa
        $idProducto = $this->request->getPost('idProducto');  // Obtiene el ID del producto desde el POST
        $nombre = $this->request->getPost('nombre');  // Obtiene el nombre del producto desde el POST
        $cantidad = $this->request->getPost('cantidad');  // Obtiene la cantidad desde el POST
        $precio = $this->request->getPost('precio');  // Obtiene el precio del producto desde el POST
        $subtotal = $cantidad * $precio;  // Calcula el subtotal (cantidad * precio)

        // Si no hay carrito en la sesión, inicializa un arreglo vacío
        $carrito = $session->get('carrito') ?? [];

        // Crea un arreglo con los detalles del producto
        $item = [
            "idProducto" => $idProducto,
            "nombre" => $nombre,
            "cantidad" => $cantidad,
            "precio" => $precio,
            "subtotal" => $subtotal,
            "idImagen" => $this->request->getPost('idImagen') // Asegúrate de incluir la imagen si es necesario
        ];

        // Si el producto ya está en el carrito, actualiza la cantidad y el subtotal
        if (isset($carrito[$idProducto])) {
            $carrito[$idProducto]['cantidad'] += $cantidad;  // Suma la cantidad
            $carrito[$idProducto]['subtotal'] = $carrito[$idProducto]['cantidad'] * $precio;  // Recalcula el subtotal
        } else {
            // Si el producto no está en el carrito, lo agrega como un nuevo elemento
            $carrito[$idProducto] = $item;
        }

        // Guarda el carrito actualizado en la sesión
        $session->set('carrito', $carrito);

        // Redirige a la página para ver el carrito
        return redirect()->to(base_url('/producto/verCarrito'));
    }

    public function eliminarProducto()
    {
        $this->checkLogin(); // Verifica si el usuario ha iniciado sesión

        $session = session();
        $index = $this->request->getJSON()->index; // Obtiene el índice enviado desde el cliente
        $carrito = $session->get('carrito');

        if (isset($carrito[$index])) {
            unset($carrito[$index]); // Elimina el producto del carrito
            $session->set('carrito', $carrito); // Actualiza el carrito en la sesión

            return $this->response->setJSON(['success' => true]);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Producto no encontrado']);
    }

    
    }
    
