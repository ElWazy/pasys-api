<?php

namespace LosYuntas\Application\controllers;

use Exception;
use LosYuntas\Application\Router;
use LosYuntas\Application\middlewares\Auth;
use LosYuntas\category\domain\CategoryRepository;
use LosYuntas\category\infrastructure\CategoryRepositoryMariaDB;
use LosYuntas\tool\domain\Tool;
use LosYuntas\tool\domain\ToolRepository;
use LosYuntas\tool\infrastructure\ToolRepositoryMariaDB;
use PDOException;

final class ToolController
{
    private ToolRepository $repository;
    private CategoryRepository $categoryRepository;

    public function __construct()
    {
        $this->repository = new ToolRepositoryMariaDB(
            'localhost',
            'panol_system',
            'master',
            'master'
        );

        $this->categoryRepository = new CategoryRepositoryMariaDB(
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

        $categories = $this->categoryRepository->getAll();

        $router->renderView('tool/index', [
            'tools' => $tools,
            'categories' => $categories,
            'isAdmin' => $isAdmin
        ]);
    }

    public function add(Router $router)
    {
        Auth::canEdit();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->repository->add(
                    new Tool(
                        null,
                        $_POST['name'], 
                        $_POST['category_id'], 
                        $_FILES['image'] ?? null, 
                        $_POST['stock_total'],
                        $_POST['stock_total'],
                        $_POST['location']
                    )
                );
            } catch (Exception $e) {
                $router->renderView('exception',[
                    'errors' => $e->getMessage()
                ]);
                exit;
            } catch (PDOException $e) {
                $router->renderView('exception',[
                    'errors' => $e->getMessage()
                ]);
                exit;
            }
        }

        header('Location: /tool');
        exit;
    }

    public function update(Router $router)
    {
        Auth::canEdit();
        
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->repository->update(
                    new Tool(
                        (int) $_POST['id'],
                        $_POST['name'], 
                        (int) $_POST['category_id'], 
                        $_FILES['image'] ?? null, 
                        (int) $_POST['stock_total'],
                        (int) $_POST['stock_actual'],
                        $_POST['location']
                    )
                );
            } catch (Exception $e) {
                $router->renderView('exception',[
                    'errors' => $e->getMessage()
                ]);
                exit;
            } catch (PDOException $e) {
                $router->renderView('exception',[
                    'errors' => $e->getMessage()
                ]);
                exit;
            }

            header('Location: /tool');
            exit;
        }
        
        $id = (int) $_GET['id'] ?? '';
        $tool = $this->repository->getById($id);
        $categories = $this->categoryRepository->getAll();

        $router->renderView('tool/update', [
            'tool' => $tool->toPrimitives(),
            'categories' => $categories,
            'errors' => $errors
        ]);
    }

    public function remove(Router $router)
    {
        Auth::canEdit();

        try {
            $this->repository->remove($_GET['id']);
            header('Location: /tool');
            exit;
        } catch (exception | pdoexception $e) {
            $router->renderView('exception', [
                'errors' => $e->getmessage()
            ]);
            exit;
        }
    }

    public function deactive(Router $router)
    {

        Auth::canEdit();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->repository->activate($_POST['id']);
            } catch (Exception | PDOException $e) {
                $router->renderView('exception', [
                    'errors' => $e->getMessage()
                ]);
                exit;
            }

            header('Location: /tool');
            exit;
        }
        $tools = $this->repository->getAllDeactivated();

        $router->renderView('tool/deactive', [
            'tools' => $tools
        ]);
    }
}
