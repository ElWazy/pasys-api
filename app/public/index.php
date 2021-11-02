<?php

use LosYuntas\Application\Router;
use LosYuntas\Application\controllers\ToolController;

require_once __DIR__.'/../../vendor/autoload.php';

$router = new Router();

// Category

// Tool
$router->get('/', [ToolController::class, 'index']);
$router->get('/tool', [ToolController::class, 'index']);
$router->get('/tool/add', [ToolController::class, 'add']);
$router->get('/tool/update', [ToolController::class, 'update']);
$router->get('/tool/remove', [ToolController::class, 'remove']);

$router->post('/tool/add', [ToolController::class, 'add']);
$router->post('/tool/update', [ToolController::class, 'update']);

// Role

// User

// Order

$router->resolve();
