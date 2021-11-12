<?php

namespace LosYuntas\Application\controllers;

use Exception;
use PDOException;
use LosYuntas\Application\Router;
use LosYuntas\Application\middlewares\Auth;
use LosYuntas\category\domain\Category;
use LosYuntas\category\domain\CategoryRepository;
use LosYuntas\category\infrastructure\CategoryRepositoryMariaDB;

final class CategoryController 
{
    private CategoryRepository $repository;

    public function __construct()
    {
        $this->repository = new CategoryRepositoryMariaDB(
            'localhost',
            'panol_system',
            'master',
            'master'
        );
    } 

    public function index(Router $router)
    {
        Auth::canEdit();
        $errors = [];

        $name = $_GET['search'] ?? '';
        if (!$name) {
            $categories = $this->repository->getAll();
        } else {
            $categories = $this->repository->getByName($name);
        }

        $router->renderView('category/index', [
            'errors' => $errors,
            'categories' => $categories
        ]);
    }

    public function add(Router $router)
    {
        Auth::canEdit();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->repository->add(
                    new Category($_POST['name'])
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

        $categories = $this->repository->getAll();

        $router->renderView('category/index', [
            'errors' => $errors,
            'categories' => $categories
        ]);
    }

    public function remove(Router $router)
    {
        Auth::canEdit();

        try {
            $this->repository->remove($_GET['id']);
            header('Location: /category');
            exit;
        } catch (Exception $e) {
            $router->renderView('exception', [
                'errors' => 'Todavia existen herramientas con esta categoria'
            ]);
            exit;
        }
    }
}
