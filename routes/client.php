<?php

use Tuyennt\Asm2Oop\Controllers\Client\AboutController;
use Tuyennt\Asm2Oop\Controllers\Client\CartController;
use Tuyennt\Asm2Oop\Controllers\Client\ContactController;
use Tuyennt\Asm2Oop\Controllers\Client\HomeController;
use Tuyennt\Asm2Oop\Controllers\Client\LoginController;
use Tuyennt\Asm2Oop\Controllers\Client\ProductController;

$router->get('/',               HomeController::class . '@index');
$router->get('/about',          AboutController::class . '@index');

$router->get('/contact',        ContactController::class . '@index');
$router->post('/contact/store', ContactController::class . '@store');

$router->get('/products',       ProductController::class . '@index');
$router->get('/products/{id}',  ProductController::class . '@detail');

$router->get('/login',          LoginController::class . '@showFormLogin');
$router->post('/handle-login',  LoginController::class . '@login');
$router->get('/logout',         LoginController::class . '@logout');

$router->get('cart/add',           CartController::class . '@add');
$router->get('cart/quantityInc',   CartController::class . '@quantityInc');
$router->get('cart/quantityDec',   CartController::class . '@quantityDec');
$router->get('cart/remove',        CartController::class . '@remove');
$router->get('cart/detail',        CartController::class . '@detail');