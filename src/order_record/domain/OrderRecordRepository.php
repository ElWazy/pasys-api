<?php

namespace LosYuntas\order_record\domain;

use LosYuntas\order_record\domain\OrderRecord;

interface OrderRecordRepository 
{
    public function getAll(): ?array;

    public function getLates(): ?array;

    public function getByCriteria(string $criteria): ?array;

    public function getById(int $id): ?array;
    
    public function getPrimitivesById(int $id): ?array;

    public function add(OrderRecord $order): void;

    public function delivery(int $id): void;
    
    public function toLate(int $id): void;
}
