<?php

use Tuyennt\Asm2Oop\Controllers\Admin\DashboardController;
use Tuyennt\Asm2Oop\Controllers\Admin\UserController;

$router->mount('/admin', function () use ($router) {

    $router->before('GET|POST', '/admin/*.*', function() {
        if (! isset($_SESSION['user'])) {
            header('location: ' . url('login') );
            exit();
        }
    });

    $router->get('/',                   DashboardController::class . '@dashboard');

    $router->mount('/users', function () use ($router) {

        $router->get('/',                   UserController::class . '@index');
        $router->get('/create',             UserController::class . '@create');
        $router->post('/store',             UserController::class . '@store');
        $router->get('/{id}/show',          UserController::class . '@show');
        $router->get('/{id}/edit',          UserController::class . '@edit');
        $router->post('/{id}/update',       UserController::class . '@update');
        $router->get('/{id}/delete',        UserController::class . '@delete');
    });
});
