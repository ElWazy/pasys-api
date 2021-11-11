<?php

namespace LosYuntas\Application\controllers;

use Exception;
use LosYuntas\Application\Router;
use LosYuntas\Application\middlewares\Auth;
use LosYuntas\tool\domain\Tool;
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
        $isAdmin = Auth::isAdmin();

        $errors = [];
        if ($isAdmin && $_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->repository->add(
                    new Tool(
                        $_POST['name'], 
                        $_POST['category_id'], 
                        $_FILES['image'] ?? null, 
                        $_POST['stock_total'] 
                    )
                );
            } catch (Exception $e) {
                $errors[] = $e->getMessage();
            }
        }

        $tools = $this->repository->getAll();

        $router->renderView('tool/index', [
            'tools' => $tools,
            'isAdmin' => $isAdmin
        ]);
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
