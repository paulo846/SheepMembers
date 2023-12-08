<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

$routes->get('extra/key', 'Extras::index');

$routes->get('api', 'Api\Home::index');
$routes->get('loaderio-5722ebd4e621d8d8911683126c09dece', 'Teste::index');


$routes->post('open/api/cliente/(:num)', 'Api\Home::cliente/$1');

include "Routes/Clients.php";
include "Routes/Admin.php";
include "Routes/Superadmin.php";
