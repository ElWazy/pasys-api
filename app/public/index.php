<?php

use LosYuntas\Application\Router;
use LosYuntas\Application\controllers\CategoryController;
use LosYuntas\Application\controllers\OrderController;
use LosYuntas\Application\controllers\RoleController;
use LosYuntas\Application\controllers\StatisticsOrderController;
use LosYuntas\Application\controllers\StatisticsToolController;
use LosYuntas\Application\controllers\StatisticsUserController;
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
$router->get('/order_record/sendEmail', [new OrderController(), 'email']);

$router->post('/order_record/add', [new OrderController(), 'add']);
$router->post('/order_record/delivery', [new OrderController(), 'delivery']);

// User
$router->get('/user', [new UserController(), 'index']);
$router->get('/user/add', [new UserController(), 'add']);
$router->get('/user/update', [new UserController(), 'update']);
$router->get('/user/updatePassword', [new UserController(), 'updatePassword']);
$router->get('/user/remove', [new UserController(), 'remove']);
$router->get('/user/UserGrafic', [new UserController(), 'UserGrafic']);

$router->post('/user/add', [new UserController(), 'add']);
$router->post('/user/update', [new UserController(), 'update']);
$router->post('/user/updatePassword', [new UserController(), 'updatePassword']);
$router->post('/user/UserGrafic', [new UserController(), 'UserGrafic']);

// Login
$router->get('/login', [new UserController(), 'login']);
$router->post('/login', [new UserController(), 'login']);

$router->get('/logout', [new UserController(), 'logout']);

// Graffic
$router->get('/api/statistics/user', [new StatisticsUserController(), 'api']);

$router->get('/statistics/tool', [new StatisticsToolController(), 'index']);
$router->get('/api/statistics/tool', [new StatisticsToolController(), 'api']);
$router->get('/api/statistics/order/count', [new StatisticsOrderController(), 'count']);

$router->resolve();
