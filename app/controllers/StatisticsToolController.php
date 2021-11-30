<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;
use LosYuntas\Application\middlewares\Auth;
use LosYuntas\tool\infrastructure\ToolRepositoryMariaDB;

final class StatisticsToolController
{
    private ToolRepository $repository;

    public function __constructor()
    {
        $this->repository = new ToolRepositoryMariaDB(
            'localhost',
            'panol_system',
            'master',
            'master'
        );
    }

    public function index(Router $router)
    {
        Auth::canEdit();

        $router->renderView('tool/grafic');
    }

    public function api(Router $router)
    {

    }
}
