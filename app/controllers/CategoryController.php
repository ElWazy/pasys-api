<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;

final class CategoryController 
{
    public function index(Router $router)
    {
        echo 'Category Index Page';
    }

    public function add(Router $router)
    {
        echo 'Category Add Page';
    }

    public function remove(Router $router)
    {
        echo 'Remove Category';
    }
}
