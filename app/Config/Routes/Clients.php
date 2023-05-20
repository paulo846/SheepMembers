<?php

$routes->get('/', 'Home::index', ['filter' => 'loggedclient']);
//$routes->get('/', 'Home::index');

$routes->get('/teste', 'Teste::index');

$routes->get('/mostrar', 'Teste::mostrar');



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
        $routes->get('avisos',          'Client\Api::avisos',      ['filter' => 'loggedclient']);
        $routes->get('verify/(:num)', 'Client\Api::verify/$1');
        
        //posts
        $routes->post('messages/(:num)', 'Client\Api::send/$1', ['filter' => 'loggedclient']);
        $routes->post('perfil', 'Client\Api::perfil', ['filter' => 'loggedclient']);


    });
});
