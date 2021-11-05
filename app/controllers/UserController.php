<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;

final class UserController
{
    public function index(Router $router)
    {
        echo 'User Index Page';
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
