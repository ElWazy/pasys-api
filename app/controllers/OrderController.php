<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;
use LosYuntas\Application\middlewares\Auth;
use LosYuntas\order_record\domain\Order_record;
use LosYuntas\order_record\domain\Order_recordRepository;
use LosYuntas\order_record\infrastructure\OrderRecordRepositoryMariaDB;

use Exception;
use PDOException;

final class OrderController
{
    private Order_recordRepository $repository;

    public function __construct()
    {
        $this->repository = new OrderRecordRepositoryMariaDB(
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
            $user = $this->repository->getByCriteria($name);
        }

        $roles = $this-> rolerepository -> getAll();

        $router->renderView('order_record/index', [
            
        ]);
    }
   

    public function remove(Router $router)
    {
        echo 'Remove User Page';
    }


}
