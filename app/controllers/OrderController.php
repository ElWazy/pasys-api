<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;
use LosYuntas\Application\middlewares\Auth;
use LosYuntas\order_record\infrastructure\OrderRecordRepositoryMariaDB;
use LosYuntas\order_record\domain\OrderRecordRepository;

use Exception;
use PDOException;

final class OrderController
{
    private OrderRecordRepository $repository;

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
            $orders = $this->repository->getAll();
        } else {
            $orders = $this->repository->getByCriteria($name);
        }

        $roles = $this->repository->getAll();

        $router->renderView('order_record/index', [
            'orders' => $orders
        ]);
    }
   

    public function delivery(Router $router)
    {
        echo 'Remove User Page';
    }


}
