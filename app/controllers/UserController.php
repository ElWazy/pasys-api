<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;
use LosYuntas\Application\middlewares\Auth;
use LosYuntas\user\domain\User;
use LosYuntas\user\domain\UserRepository;
use LosYuntas\user\infrastructure\UserRepositoryMariaDB;

final class UserController
{

    private UserRepository $repository;

    public function __construct()
    {
        $this->repository = new UserRepositoryMariaDB(
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
            $user = $this->repository->getAll();
        } else {
            $user = $this->repository->getByName($name);
        }

        $router->renderView('user/index', [
            'user' => $user,
        ]);
    }


    public function add(Router $router)
    {
        echo 'User Add Page';
    }

    public function update(Router $router)
    {
        echo 'User Update Page';
    }

    public function remove(Router $router)
    {
        echo 'Remove User Page';
    }
}
