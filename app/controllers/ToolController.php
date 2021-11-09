<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;
use LosYuntas\tool\application\ToolSearcher;
use LosYuntas\tool\domain\ToolRepository;
use LosYuntas\tool\infrastructure\ToolRepositoryMariaDB;

final class ToolController
{
    private ToolRepository $repository;

    public function __construct()
    {
        $this->repository = new ToolRepositoryMariaDB(
            'localhost',
            'panol_system',
            'master',
            'master'
        );
    } 

    public function index(Router $router)
    {
        $criteria = $_GET['search'] ?? '';
        $searcher = new ToolSearcher($this->repository);
        $tools = [];
        
        if ($criteria) {
            $tools = $searcher->getByCriteria($criteria);
        } else {
            $tools = $searcher->getAll();
        }

        echo '<pre>';
        var_dump($criteria);
        foreach($tools as $tool) {
            echo $tool->name();
        }
        echo '</pre>';
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
