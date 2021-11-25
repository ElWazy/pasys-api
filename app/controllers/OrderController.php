<?php

namespace LosYuntas\Application\controllers;

use LosYuntas\Application\Router;
use LosYuntas\Application\middlewares\Auth;
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
            try {
                session_start();

                $worker = $this->userRepository->getByCriteria($_POST['worker']);
                $tool = $this->toolRepository->getById((int) $_POST['tool']);


                $order = new OrderRecord(
                    null,
                    $worker[0]['id'],
                    $tool[0]['id'],
                    $tool[0]['stock_actual'],
                    $_POST['amount'],
                    $_SESSION['userId']
                );

               
                $this->repository->add(
                    new OrderRecord(
                        null,
                        $worker[0]['id'],
                        $tool[0]['id'],
                        $tool[0]['stock_actual'],
                        $_POST['amount'],
                        $_SESSION['userId']
                    )
                );
                 
            } catch (Exception $e) {
                $router->renderView('exception',[
                    'errors' => $e->getMessage()
                ]);
                exit;
            } catch (PDOException $e) {
                $router->renderView('exception',[
                    'errors' => $e->getMessage()
                ]);
                exit;
            }
        }

         header('Location: /order_record');
         exit;
    }

    public function delivery(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }

        $router->renderView('order_record/delivery');
    }
}
