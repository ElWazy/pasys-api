<?php

namespace LosYuntas\Application\controllers;

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

        $name = $_GET['search'] ?? '';
        if (!$name) {
            $roles = $this->repository->getAll();
        } else {
            $roles = $this->repository->getByName($name);
        }

        $router->renderView('role/index', [
            'roles' => $roles
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
                new Role($_POST['name'])
            );
        }

        $roles = $this->repository->getAll();

        $router->renderView('role/index', [
            'errors' => $errors,
            'roles' => $roles
        ]);
    }

    public function remove(Router $router)
    {
        echo 'Remove Role Page';
    }
}
