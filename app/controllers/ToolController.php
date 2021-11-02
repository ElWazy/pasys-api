<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;

class ToolController
{
    public function index(Router $router)
    {
        echo "Index Page";
    }

    public function add(Router $router)
    {
        echo "Add Page";
    }

    public function update(Router $router)
    {
        echo "Update Page";
    }

    public function remove(Router $router)
    {
        echo "Delete Page";
    }
}
