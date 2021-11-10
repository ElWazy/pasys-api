<?php

namespace LosYuntas\Application\controllers;

use Exception;
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

        $name = $_GET['search'] ?? '';
        if (!$name) {
            $categories = $this->repository->getAll();
        } else {
            $categories = $this->repository->getByName($name);
        }

        $router->renderView('category/index', [
            'categories' => $categories,
        ]);
    }

    public function add(Router $router)
    {
        Auth::canEdit();

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!$_POST['name']) {
                $errors[] = 'Campo del nombre vacio';
            }

            $this->repository->add(
                new Category($_POST['name'])
            );
        }

        $router->renderView('category/add', [
            'errors' => $errors
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
            echo "Todavia existen herramientas con esta categoria";
        }
    }
}
