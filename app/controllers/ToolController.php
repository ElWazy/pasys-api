<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;
use LosYuntas\tool\domain\ToolRepository;
use LosYuntas\tool\infrastructure\MariaDBToolRepository;

final class ToolController
{
    private ToolRepository $repository;

    public function __construct()
    {
        $this->repository = new MariaDBToolRepository(
            'localhost',
            'panol_system',
            'master',
            'master'
        );
    } 

    public function index(Router $router)
    {
        
        echo 'Tool Index Page';
    }

    public function add(Router $router)
    {
        echo 'Tool Add Page';
    }

    public function update(Router $router)
    {
        echo 'Tool Update Page';
    }

    public function remove(Router $router)
    {
        echo 'Delete Tool Page';
    }
}
