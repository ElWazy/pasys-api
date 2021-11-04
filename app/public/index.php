<?php

use LosYuntas\Application\Router;
use LosYuntas\Application\controllers\ToolController;

require_once __DIR__.'/../../vendor/autoload.php';

$router = new Router();

// Category
$router->get();

// Tool
$router->get('/', [new ToolController(), 'index']);
$router->get('/tool', [new ToolController(), 'index']);
$router->get('/tool/add', [new ToolController(), 'add']);
$router->get('/tool/update', [new ToolController(), 'update']);
$router->get('/tool/remove', [new ToolController(), 'remove']);

$router->post('/tool/add', [new ToolController(), 'add']);
$router->post('/tool/update', [new ToolController(), 'update']);

// Role

// User

// Order

$router->resolve();
