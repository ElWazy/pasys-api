<?php

namespace LosYuntas\Application\controllers;

use Exception;
use LosYuntas\Application\Router;
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
        /* Only Admin can see this page: This is checked by is session created */
        // $isAdmin = isset($_SESSION['isActive']);
        $isAdmin = true;
        if (!$isAdmin) {
            header('Location: /');
            exit;
        }

        $name = $_GET['search'] ?? '';
        if (!$name) {
            $categories = $this->repository->getAll();
        } else {
            $categories= $this->repository->getByName($name);
        }

        $router->renderView('category/index', [
            'categories' => $categories,
        ]);
    }

    public function add(Router $router)
    {
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
        /* Only Admin can see this page: This is checked by is session created */
        // $isAdmin = isset($_SESSION['isActive']);
        $isAdmin = true;
        if (!$isAdmin) {
            header('Location: /');
            exit;
        }

        try {
            $this->repository->remove($_GET['id']);
            header('Location: /category');
            exit;
        } catch (Exception $e) {
            echo "Todavia existen herramientas con esta categoria";
        }
    }
}
