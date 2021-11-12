<?php

namespace LosYuntas\order_record\domain;

interface Order_recordRepository 
{
    public function getAll(): ?array;

    public function getByCriteria(string $criteria): ?array;

    public function getById(int $id): ?array;

    public function add(Order_record $order_record): void;

    public function update(Order_record $order_record): void;

    public function remove(int $id): void;
    
}