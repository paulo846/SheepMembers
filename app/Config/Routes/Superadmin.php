<?php

$routes->group('superadmin', static function ($routes) {
    
    //imprimir
    $routes->get('imprimir/lista/(:num)', 'Super\Api\Participantes::listaEmpresaCliente/$1', ['filter' => 'loggedsuper']);
    $routes->get('imprimir/csv/(:num)', 'Super\Api\Participantes::downloadListRelatorio/$1', ['filter' => 'loggedsuper']);


    $routes->get('relacionamento/excluir/(:num)', 'Super\Api\Participantes::excluirRelacionamento/$1', ['filter' => 'loggedsuper']);

    //GETS PROTEGIDOS
    $routes->get('', 'Super\Home::index', ['filter' => 'loggedsuper']);
    $routes->get('alunos', 'Super\Home::alunos', ['filter' => 'loggedsuper']);

    $routes->get('empresas', 'Super\Empresas::index', ['filter' => 'loggedsuper']);
    $routes->get('empresas/antigo', 'Super\Empresas::antigo', ['filter' => 'loggedsuper']);
    $routes->get('empresas/new', 'Super\Empresas::new', ['filter' => 'loggedsuper']);
    $routes->get('empresas/(:num)', 'Super\Empresas::edit/$1', ['filter' => 'loggedsuper']);
    
    $routes->get('config/(:num)', 'Super\Empresas::edit/$1', ['filter' => 'loggedsuper']);
    
    $routes->get('edit/(:num)', 'Super\Empresas::edit0/$1', ['filter' => 'loggedsuper']);


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
        $routes->post('empresa/update', 'Super\Api\Empresas::update');

        //carrossel
        $routes->post('empresa/carrossel', 'Super\Api\Empresas::carrossel');

        //Avisos
        $routes->post('empresa/aviso/add', 'Super\Api\Empresas::addaviso');

        //
        

        //CONFIG
        $routes->post('config/(:num)/(:any)', 'Super\Api\Config::update/$1/$2');
        $routes->post('config/update/analytics', 'Super\Api\Config::updateAnalytics');
        $routes->post('config/upload/images', 'Super\Api\Config::updateImages');
        $routes->post('config/traducao/(:any)', 'Super\Api\Config::traducao/$1');
        $routes->post('config/gravacao', 'Super\Api\Config::gravacao');

        //PARTICIPANTES
        $routes->get('cliente/(:num)', 'Super\Api\Participantes::show/$1');
        $routes->post('cliente/new', 'Super\Api\Participantes::create');
        $routes->post('cliente/new/list', 'Super\Api\Participantes::list');

        //ALUNO
        $routes->get('aluno/(:num)', 'Super\Api\Participantes::show/$1');
        $routes->get('aluno/bloquear/(:num)/(:num)', 'Super\Api\Participantes::bloquear/$1/$2');
        $routes->post('aluno/reenvio', 'Super\Api\Participantes::reenviar');
    });
    
}); 