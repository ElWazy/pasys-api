<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;
use LosYuntas\Application\middlewares\Auth;
use LosYuntas\tool\domain\ToolRepository;
use LosYuntas\tool\infrastructure\ToolRepositoryMariaDB;

final class ToolController
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
        $isAdmin = Auth::isAdmin();

        $criteria = $_GET['search'] ?? '';

        if (!$criteria) {
            $tools = $this->repository->getAll();
        } else {
            $tools = $this->repository->getByCriteria($criteria);
        }

        $router->renderView('tool/index', [
            'tools' => $tools,
            'isAdmin' => $isAdmin
        ]);
    }

    public function add(Router $router)
    {
        echo 'Tool Add Page';
    }

    public function update(Router $router)
    {
        echo 'Tool Update Page';
    }

    public function remove(Router $router)
    {
        echo 'Delete Tool Page';
    }
}
