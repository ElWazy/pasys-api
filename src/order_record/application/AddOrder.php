<?php

namespace LosYuntas\order_record\application;

use Exception;
use LosYuntas\order_record\domain\OrderRecord;
use LosYuntas\order_record\domain\OrderRecordRepository;
use LosYuntas\tool\domain\Tool;
use LosYuntas\tool\domain\ToolRepository;
use LosYuntas\user\domain\User;
use LosYuntas\user\domain\UserRepository;

class AddOrder 
{
    private OrderRecordRepository $repository;
    private UserRepository $userRepository;
    private ToolRepository $toolRepository;

    public function __construct(
        OrderRecordRepository $repository,
        UserRepository $userRepository,
        ToolRepository $toolRepository
    ) 
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->toolRepository = $toolRepository;
    }

    public function create(
        string $workerRut, 
        int $panolerId,
        int $toolId, 
        int $amount
    ): void {
        $panoler = $this->userRepository->getById($panolerId);
        $worker  = $this->userRepository->getByRut($workerRut);
        $tool    = $this->toolRepository->getById($toolId);

        $this->canSupplyStock($tool, $amount);
        $this->userExists($panoler);
        $this->userExists($worker);

        $this->repository->add(
            new OrderRecord(
                null,
                $worker,
                $tool,
                $amount,
                $panoler
            )
        );

        $tool->discountStockActual($amount);
        $this->toolRepository->discountStockActual($tool);
    }

    private function canSupplyStock(Tool $tool, int $amount)
    {
        if ( $tool->overloadStockActual($amount) ) {
            throw new Exception('La cantidad pedida supera el stock actual');
            return;
        }
    }

    private function userExists(User $user = null) 
    {
        if ( $user === null ) {
            throw new Exception('No se encuentra el usuario');
            return;
        }
    }
}
