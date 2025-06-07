<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Casa', 'Home::index');
$routes->get('quienesSomos', 'Home::quienes_somos');
$routes->get('Comercializacion', 'Home::Comercializacion');
$routes->get('Info_contact', 'Home::Contact');
$routes->get('Terminos_Uso', 'Home::terminosUso');
$routes->get('Catalogo_productos', 'Home::productos');
//$routes->get('form_alta', 'Home::alta_productos');

/*rutas del registro de usuario*/
$routes->get('registro', 'Usuario_controller::create');
//verifica que el usuario haya iniciado sesión antes de permitir el acceso.
//$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);//Esto evita que usuarios no autenticados accedan a /perfil o /dashboard.
$routes->post('enviar-form','Usuario_controller::formValidation'); 

/*rutas para el login*/
$routes->get('Login', 'Home::login');
$routes->post('enviarlogin', 'Login_controller::auth');
$routes->get('/panel', 'panel_controller::index', ['filter' => 'auth']);//nose para que sirve esto
$routes->get('/logout', 'Login_controller::logout');

/*Rutas de Productos*/
$routes->get('crear', 'Productocontroller::index',['filter' => 'auth']);
$routes->get('/agregar', 'Productocontroller::index',['filter' => 'auth']);//me parece que es lo mismo q crear
$routes->get('form_alta', 'Productocontroller::creaproducto',['filter' => 'auth']);
$routes->post('enviar-prod', 'Productocontroller::store',['filter' => 'auth']);
$routes->get('/editar/(:num)', 'Productocontroller::singleproducto/$1',['filter' => 'auth']);
$routes->post('modifica/(:num)', 'Productocontroller::modifica/$1',['filter' => 'auth']);
$routes->get('borrar/(:num)', 'Productocontroller::deleteproducto/$1');
$routes->get('eliminados', 'Productocontroller::eliminados',['filter' => 'auth']);
$routes->get('activar_pro/(:num)', 'Productocontroller::activarproducto/$1',['filter' => 'auth']);


//$routes->get('vista_compras/(:num)', 'Ventascontroller::ver_factura/$1', ['filter' => 'auth']);

$routes->get('catalogo', 'Productocontroller::MostrarCatalogo',['filter' => 'auth']);

/*RUTAS DEL CARRITO*/

$routes->get('carrito', 'CarritoController::index', ['filter' => 'auth']);
$routes->post('carrito/agregar', 'CarritoController::agregar', ['filter' => 'auth']);
$routes->post('carrito/actualizar', 'CarritoController::actualizar', ['filter' => 'auth']); // Usamos POST para actualizar
$routes->get('carrito/eliminar/(:num)', 'CarritoController::eliminar/$1', ['filter' => 'auth']);
$routes->get('carrito/vaciar', 'CarritoController::vaciar', ['filter' => 'auth']);

$routes->get('/comprar', 'Ventas_controller::registrar_venta', ['filter' => 'auth']);
$routes->get('/facturitas/(:num)', 'Ventas_controller::ver_facturas_usuario/$1', ['filter' => 'auth']);
///$routes->get('carrito/checkout', 'CarritoController::checkout',);
