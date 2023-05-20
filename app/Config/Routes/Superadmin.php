<?php

$routes->group('superadmin', static function ($routes) {
    //GETS PROTEGIDOS
    $routes->get('', 'Super\Home::index', ['filter' => 'loggedsuper']);
    $routes->get('alunos', 'Super\Home::alunos', ['filter' => 'loggedsuper']);

    $routes->get('empresas', 'Super\Empresas::index', ['filter' => 'loggedsuper']);
    $routes->get('empresas/new', 'Super\Empresas::new', ['filter' => 'loggedsuper']);
    $routes->get('empresas/(:num)', 'Super\Empresas::edit/$1', ['filter' => 'loggedsuper']);
    $routes->get('edit/(:num)', 'Super\Empresas::edit/$1', ['filter' => 'loggedsuper']);


    $routes->get('participantes', 'Super\Participantes::index', ['filter' => 'loggedsuper']);
    $routes->get('participantes/buscar/(:num)', 'Super\Participantes::search', ['filter' => 'loggedsuper']);
    $routes->get('participantes/(:num)', 'Super\Participantes::edit/$1', ['filter' => 'loggedsuper']);
    $routes->post('participantes', 'Super\Participantes::new', ['filter' => 'loggedsuper']);

    $routes->get('logout', 'Super\Home::sair', ['filter' => 'loggedsuper']);

    //GETS
    $routes->get('login', 'Super\Login::index');

    //POSTS
    $routes->post('auth', 'Super\Login::auth');

    //POSTS PROTEGIDOS

    //SUPER ADMIN API
    $routes->group('api', ['filter' => 'loggedsuper'], static function($routes){
        $routes->get('empresas', 'Super\Api\Empresas::index');
        $routes->post('empresas', 'Super\Api\Empresas::create');
        $routes->post('empresas/(:num)', 'Super\Api\Empresas::update/$1');

        //CONFIG
        $routes->post('config/(:num)/(:any)', 'Super\Api\Config::update/$1/$2');

        //PARTICIPANTES
        $routes->get('cliente/(:num)', 'Super\Api\Participantes::show/$1');
        $routes->post('cliente/new', 'Super\Api\Participantes::create');
        $routes->post('cliente/new/list', 'Super\Api\Participantes::list');

        //ALUNO
        $routes->get('aluno/(:num)', 'Super\Api\Participantes::show/$1');
        $routes->post('aluno/reenvio', 'Super\Api\Participantes::reenviar');
    });
    
}); 