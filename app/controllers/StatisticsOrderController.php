<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;
use LosYuntas\Application\middlewares\Auth;
use LosYuntas\order_record\domain\OrderRecordRepository;
use LosYuntas\order_record\infrastructure\OrderRecordRepositoryMariaDB;

final class StatisticsOrderController
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
    public function count(Router $router) 
    {
        Auth::canEdit();

        echo json_encode($this->repository->getLatesCount());
    }
}
