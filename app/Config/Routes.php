<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');



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


//Rutas del cliente

$routes->get('/topMenu', 'Home::index');
$routes->get('/principal', 'Home::index');
$routes->get('/producto/showC', 'Producto::showC');














