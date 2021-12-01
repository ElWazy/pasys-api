<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;
use LosYuntas\Application\middlewares\Auth;
use LosYuntas\tool\infrastructure\ToolRepositoryMariaDB;
use LosYuntas\tool\domain\ToolRepository;

final class StatisticsToolController
{
    private ToolRepository $repository;

    public function __construct()
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
        Auth::canEdit();

        echo json_encode($this->repository->statistics());
    }
}
