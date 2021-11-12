<?php

namespace LosYuntas\order_record\domain;

use DateTime;
use Exception;

final class OrderRecord
{
    private ?int $id;
    private int $worker;
    private int $tool;
    private int $amount;
    private string $order_date;
    private string $delivery_date;
    private int $panolero;

    public function __construct(
        int $id  = null,
        int $worker,
        int $tool,
        int $amount,
        int $panolero
    )
    {
        $this->id = $id ?? null;
        $this->worker = $worker;
        $this->tool = $tool;
        $this->amount = $amount;
        $this->order_date = date('Y-m-d');
        $this->delivery_date = date(
            'Y-m-d', 
            strtotime($this->order_date . ' + 1 day')
        );
        $this->panolero = $panolero;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function panolero(): int
    {
        return $this->panolero;
    }

    public function worker(): int
    {
        return $this->worker;
    }

    public function tool(): int
    {
        return $this->tool;
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function order_date(): string
    {
        return $this->order_date;
    }

    public function delivery_date(): string
    {
        return $this->delivery_date;
    }
}
