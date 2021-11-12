<?php

use LosYuntas\Application\Router;
use LosYuntas\Application\controllers\CategoryController;
use LosYuntas\Application\controllers\OrderController;
use LosYuntas\Application\controllers\RoleController;
use LosYuntas\Application\controllers\ToolController;
use LosYuntas\Application\controllers\UserController;

require_once __DIR__.'/../../vendor/autoload.php';

$router = new Router();

// Category
$router->get('/category', [new CategoryController(), 'index']);
$router->get('/category/add', [new CategoryController(), 'add']);
$router->get('/category/remove', [new CategoryController(), 'remove']);

$router->post('/category/add', [new CategoryController(), 'add']);

// Tool
$router->get('/', [new ToolController(), 'index']);
$router->get('/tool', [new ToolController(), 'index']);
$router->get('/tool/add', [new ToolController(), 'add']);
$router->get('/tool/update', [new ToolController(), 'update']);
$router->get('/tool/remove', [new ToolController(), 'remove']);
$router->get('/tool/deactive', [new ToolController(), 'deactive']);

$router->post('/tool/add', [new ToolController(), 'add']);
$router->post('/tool/update', [new ToolController(), 'update']);
$router->post('/tool/deactive', [new ToolController(), 'deactive']);

// Role
$router->get('/role', [new RoleController(), 'index']);
$router->get('/role/add', [new RoleController(), 'add']);
$router->get('/role/remove', [new RoleController(), 'remove']);

$router->post('/role/add', [new RoleController(), 'add']);

// Order record
$router->get('/order_record', [new OrderController(), 'index']);
$router->get('/order_record/add', [new OrderController(), 'add']);
$router->get('/order_record/delivery', [new OrderController(), 'delivery']);

$router->post('/order_record/add', [new OrderController(), 'add']);
$router->post('/order_record/delivery', [new OrderController(), 'delivery']);

// User
$router->get('/user', [new UserController(), 'index']);
$router->get('/user/add', [new UserController(), 'add']);
$router->get('/user/update', [new UserController(), 'update']);
$router->get('/user/remove', [new UserController(), 'remove']);

$router->post('/user/add', [new UserController(), 'add']);
$router->post('/user/update', [new UserController(), 'update']);

// Login
$router->get('/login', [new UserController(), 'login']);
$router->post('/login', [new UserController(), 'login']);

$router->get('/logout', [new UserController(), 'logout']);

$router->resolve();
