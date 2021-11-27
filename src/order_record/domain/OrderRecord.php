<?php

namespace LosYuntas\order_record\domain;

use Exception;
use LosYuntas\tool\domain\Tool;
use LosYuntas\user\domain\User;

final class OrderRecord
{
    private ?int $id;
    private User $worker;
    private Tool $tool;
    private ?int $amount;
    private string $order_date;
    private string $delivery_date;
    private User $panolero;

    public function __construct(
        int $id  = null,
        User $worker,
        Tool $tool,
        int $amount,
        User $panolero
    )
    {
        if (!$worker) {
            throw new Exception('No se encuentra el trabajador');
        }

        if ($amount > $tool->stockActual()) {
            throw new Exception('El stock actual no cumple con la cantidad requerida');
        }

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
        return $this->panolero->id();
    }

    public function worker(): int
    {
        return $this->worker->id();
    }

    public function tool(): int
    {
        return $this->tool->id();
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
