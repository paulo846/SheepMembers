<?php

$routes->get('/testeapi', 'Teste::index');

$routes->get('/', 'Home::index', ['filter' => 'loggedclient']);





$routes->get('filme/(:any)', 'Home::filme/$1', ['filter' => 'loggedclient']);
$routes->get('perfil', 'Home::perfil', ['filter' => 'loggedclient']);
//$routes->get('/', 'Home::index');

$routes->get('/dataserver', 'Teste::index');
$routes->get('/teste', 'Teste::teste');



//$routes->match(['post', 'get'], '/upload', 'Teste::upload');

$routes->get('login', 'Login::index');

$routes->get('recover', 'Login::recover');
$routes->post('recover', 'Login::reloadpass');

$routes->get('sair', 'Login::logout');

$routes->post('login/auth', 'Login::auth');

$routes->get('lang/{locale}',   'Home::lang');


$routes->group('client', static function ($routes) {
    
    $routes->group('api', static function ($routes) {
        //gets
        $routes->get('messages/(:num)/(:num)', 'Client\Api::messages/$1/$2', ['filter' => 'loggedclient']);
        $routes->get('avisos/(:num)',          'Client\Api::avisos/$1',      ['filter' => 'loggedclient']);
        $routes->get('verify/(:num)', 'Client\Api::verify/$1');

        $routes->get('comentario/(:num)/(:num)', 'Client\Api::deleteComent/$1/$2', ['filter' => 'loggedclient']);

        
        //posts
        $routes->post('messages/(:num)', 'Client\Api::send/$1', ['filter' => 'loggedclient']);
        $routes->post('perfil', 'Client\Api::perfil', ['filter' => 'loggedclient']);
        
        $routes->post('comentar', 'Client\Api::comentar', ['filter' => 'loggedclient']);


    });
});
