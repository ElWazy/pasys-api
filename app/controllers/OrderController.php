<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;
use LosYuntas\Application\middlewares\Auth;
use LosYuntas\order_record\application\AddOrder;
use LosYuntas\order_record\domain\OrderRecord;
use LosYuntas\order_record\infrastructure\OrderRecordRepositoryMariaDB;
use LosYuntas\order_record\domain\OrderRecordRepository;
use LosYuntas\tool\domain\ToolRepository;
use LosYuntas\tool\infrastructure\ToolRepositoryMariaDB;
use LosYuntas\user\domain\UserRepository;
use LosYuntas\user\infrastructure\UserRepositoryMariaDB;

use Exception;
use PDOException;

final class OrderController
{
    private OrderRecordRepository $repository;
    private ToolRepository $toolRepository;
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->repository = new OrderRecordRepositoryMariaDB(
            'localhost',
            'panol_system',
            'master',
            'master'
        );

        $this->toolRepository = new ToolRepositoryMariaDB(
            'localhost',
            'panol_system',
            'master',
            'master'
        );

        $this->userRepository = new UserRepositoryMariaDB(
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

        $tools = $this->toolRepository->getAll();

        $router->renderView('order_record/index', [
            'orders' => $orders,
            'tools' => $tools
        ]);
    }
   
    public function add(Router $router)
    {
        Auth::canEdit();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();

            $addOrder = new AddOrder(
                $this->repository,
                $this->userRepository,
                $this->toolRepository
            );
            try {
                $addOrder->create(
                    $_POST['worker'],
                    (int) $_SESSION['userId'],
                    (int) $_POST['tool'],
                    (int) $_POST['amount']
                );

                header('Location: /order_record');
                exit;
            } catch (Exception | PDOException $e) {
                $router->renderView('exception', [
                    'errors' => $e->getMessage()
                ]);
            }
        }
    }

    public function delivery(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
    }
}
