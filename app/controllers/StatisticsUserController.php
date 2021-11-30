<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;
use LosYuntas\Application\middlewares\Auth;
use LosYuntas\User\infrastructure\UserRepositoryMariaDB;
use LosYuntas\user\domain\UserRepository;

final class StatisticsUserController
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

    public function api(Router $router)
    {
        Auth::canEdit();

        echo json_encode($this->repository->statistics());
    }
}
