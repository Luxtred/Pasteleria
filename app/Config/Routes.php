<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/menu', 'Home::Menu');


$routes->get('/administrador', 'Administrador::index');
$routes->get('/producto', 'Producto::index');
$routes->get('/personal', 'Personal::index');
$routes->get('/local', 'Local::index');
$routes->get('/usuario','Usuario::index');
$routes->get('/cliente','Cliente::index');


$routes->get('/administrador/add','Administrador::add');
$routes->get('/producto/add','Producto::add');
$routes->get('/personal/add','Personal::add');
$routes->get('/local/add','Local::add');

$routes->post('/administrador/insert','Administrador::insert');
$routes->post('/producto/insert','Producto::insert');
$routes->post('/personal/insert','Personal::insert');
$routes->post('/local/insert','Local::insert');

$routes->post('/administrador/update','Administrador::update/');
$routes->post('producto/update/','Producto::update/');
$routes->post('personal/update/','Personal::update/');
$routes->post('local/update/','Local::update/');

$routes->get('/administrador/edit/(:num)','Administrador::edit/$1');
$routes->get('/producto/edit/(:num)','Producto::edit/$1');
$routes->get('/personal/edit/(:num)','Personal::edit/$1');
$routes->get('/local/edit/(:num)','Local::edit/$1');

$routes->get('/administrador/delete/(:num)','Administrador::delete/$1');
$routes->get('/producto/delete/(:num)','Producto::delete/$1');
$routes->get('/personal/delete/(:num)','Personal::delete/$1');
$routes->get('/local/delete/(:num)','Local::delete/$1');


$routes->get('/usuario/salir','Usuario::salir');

$routes->post('/usuario/acceder','Usuario::acceder');
$routes->get('/usuario/miCuenta','Usuario::micuenta');
//$routes->post('/usuario/crear_cuenta(:num)','Usuario::registrarUsuario/$1');
$routes->post('/usuario/registrarUsuario(:num)', 'Usuario::registrarUsuario/$1');
$routes->post('/usuario/registrarUsuario', 'Usuario::registrarUsuario');

//Rutas del cliente

$routes->get('/topMenu', 'Home::index');
$routes->get('/principal', 'Principal::index');
$routes->get('/producto/showC', 'Producto::showC');
$routes->get('/producto/pastelP/(:num)', 'Producto::pastelP/$1');
$routes->get('/local/sucursal', 'Local::sucursal');
$routes->get('local/selecionS', 'Local::mostrarSucursales');
$routes->get('/cliente/promociones','Cliente::promociones');
$routes->get('/cliente/detalle/(:num)', 'Cliente::Detalle/$1');
$routes->post('/usuario/guardarSucursal', 'Usuario::guardarSucursal');
$routes->get('/cliente/nuevo','Cliente::Nuevo');

$routes->get('producto/verCarrito', 'Producto::verCarrito');
$routes->post('/producto/insertCarrito', 'Producto::insertCarrito');
$routes->post('producto/pagar', 'Producto::pagar');


$routes->get('/producto/mostrarCarrito', 'Producto::mostrarCarrito');
$routes->post('/producto/agregarAlCarrito/(:num)', 'Producto::agregarAlCarrito/$1');
$routes->post('/producto/actualizarCantidadCarrito', 'Producto::actualizarCantidadCarrito');
$routes->get('/producto/eliminarDelCarrito/(:num)', 'Producto::eliminarDelCarrito/$1');
//añadir imagenes

$routes->get('upload', 'Upload::index');          // Add this line.
$routes->post('upload/upload', 'Upload::upload'); // Add this line.
$routes->get('upload/viewFiles', 'Upload::viewFiles');
$routes->get('Imagen/getFile/(:num)', 'Imagen::getFile/$1');
$routes->post('/Imagen/upload','Imagen::upload');
$routes->get('/imagen/add','Imagen::add');

$routes->get('/image/add','Image::add');
$routes->get('Image/getFile/(:num)', 'Image::getFile/$1');
$routes->post('/Image/upload','Image::upload');


$routes->get('imagen/edit_image/(:num)', 'Imagen::edit_image/$1');
$routes->post('imagen/update/(:num)', 'Imagen::update/$1');











