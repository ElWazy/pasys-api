<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;

final class RoleController
{
    public function index(Router $router)
    {
        echo 'Role Index Page';
    }

    public function add(Router $router)
    {
        echo 'Role Add Page';
    }

    public function remove(Router $router)
    {
        echo 'Remove Role Page';
    }
}
