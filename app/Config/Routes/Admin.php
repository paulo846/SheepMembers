<?php

$routes->group('admin', static function ($routes) {
    $routes->get('', 'Admin\Home::index', ['filter' => 'loggedadmin']);
    $routes->get('login', 'Admin\Login::index');
});