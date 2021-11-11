<?php

namespace LosYuntas\Application\controllers;

use Exception;
use LosYuntas\Application\Router;
use LosYuntas\Application\middlewares\Auth;
use LosYuntas\role\domain\Role;
use LosYuntas\role\domain\RoleRepository;
use LosYuntas\role\infrastructure\RoleRepositoryMariaDB;

final class RoleController
{
    private RoleRepository $repository;

    public function __construct() 
    {
        $this->repository = new RoleRepositoryMariaDB(
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
            $roles = $this->repository->getAll();
        } else {
            $roles = $this->repository->getByName($name);
        }

        $router->renderView('role/index', [
            'errors' => $errors,
            'roles' => $roles
        ]);
    }

    public function add(Router $router)
    {
        Auth::canEdit();

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->repository->add(
                    new Role($_POST['name'])
                );
            } catch(Exception $e) {
                $errors[] = $e->getMessage();
            }
        }

        $roles = $this->repository->getAll();

        $router->renderView('role/index', [
            'errors' => $errors,
            'roles' => $roles
        ]);
    }

    public function remove(Router $router)
    {
        Auth::canEdit();

        try {
            $this->repository->remove($_GET['id']);
            header('Location: /role');
            exit;
        } catch (Exception $e) {
            echo "Todavia existen usuarios con este rol";
        }
    }
}
