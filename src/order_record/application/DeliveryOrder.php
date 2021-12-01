<?php

namespace LosYuntas\order_record\application;

use Exception;
use LosYuntas\order_record\domain\OrderRecordRepository;
use LosYuntas\tool\domain\ToolRepository;
use LosYuntas\user\domain\UserRepository;

final class DeliveryOrder
{
    private OrderRecordRepository $repository;
    private ToolRepository $toolRepository;

    public function __construct(
        OrderRecordRepository $repository,
        ToolRepository $toolRepository
    ) 
    {
        $this->repository = $repository;
        $this->toolRepository = $toolRepository;
    }

    public function execute(int $id, int $amount): void
    {
        $order = $this->repository->getById($id);
        $tool = $this->toolRepository->getById($order['tool_id']);

        $this->verifyAmount($order['amount'], $amount);

        $this->repository->delivery($id);

        $tool->addStockActual($amount);
        $this->toolRepository->changeStockActual($tool);
    }

    private function verifyAmount(int $amount, int $newAmount): void
    {
        if ($newAmount < $amount) {
            throw new Exception('Faltan herramientas por entregar');
        }
        
        if ($newAmount > $amount) {
            throw new Exception('Sobran herramientas por entregar');
        }
    }
}
