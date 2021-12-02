<?php

namespace LosYuntas\order_record\infrastructure;

use LosYuntas\order_record\domain\OrderRecord;
use LosYuntas\order_record\domain\OrderRecordRepository;

final class OrderRecordRepositoryInMemory implements OrderRecordRepository
{


    public function delivery(int $id): void
    {
    }

    public function add(OrderRecord $order): void
    {
    }

    public function getPrimitivesById(int $id): ?array
    {
        return null;
    }
    public function getById(int $id): ?array
    {
        return null;
    }
    public function getAll(): ?array
    {
        return null;
    }

    public function getByCriteria(string $criteria): ?array
    {
        return null;
    }

    public function getLatesCount(): ?array
    {
        return null;
    }

    public function getLates(): ?array
    {
        return [
            [
                'id'          => 1,
                'trabajador'  => 'Daniel Santana',
                'rut'         => '20.435.532-1',
                'herramienta' => 'Diablo',
                'amount'      => 4,
                'order_date'  => '2021-11-14',
                'deadline'    => '2021-11-15',
                'panolero'    => 'Manuel Santamaría'
            ]
        ];
    }

    public function toLate(int $id): void
    {
    }
}
