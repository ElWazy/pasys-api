<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;
use LosYuntas\tool\domain\ToolRepository;
use LosYuntas\tool\infrastructure\MariaDBToolRepository;

final class ToolController
{
    private ToolRepository $repository;

    public function __construct()
    {
        $this->repository = new MariaDBToolRepository(
            'localhost',
            'panol_system',
            'master',
            'master'
        );
    } 

    public function index(Router $router)
    {
        $tools = $this->repository->getAll();
        $router->renderView('tool/index', [
            'tools' => $tools
        ]);
    }

    public function add(Router $router)
    {
        echo "Add Page";
    }

    public function update(Router $router)
    {
        echo "Update Page";
    }

    public function remove(Router $router)
    {
        echo "Delete Page";
    }
}
