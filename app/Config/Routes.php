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

/*rutas del registro de usuario*/
$routes->get('registro', 'Usuario_controller::create');
$routes->post('enviar-form','Usuario_controller::formValidation'); 


