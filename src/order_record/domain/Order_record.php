<?php

namespace LosYuntas\order_record\domain;

use DateTime;
use Exception;

final class Order_record
{
    private ?int $id;
    private int $worker_id;
    private int $tool_id;
    private int $amount;
    private DateTime $order_date;
    private DateTime $delivery_date;
    private int $panolero_id;
    private int $state_id;

    public function __construct(
        
        int $id  = null,
        int $worker_id,
        int $tool_id,
        int $amount,
        DateTime $order_date,
        DateTime $delivery_date,
        int $panolero_id,
        int $state_id   

    )
    {
        $this->id = $id ?? null;
        $this->worker_id = $worker_id;
        $this->tool_id = $tool_id;
        $this->amount = $amount;
        $this->order_date = $order_date;
        $this->delivery_date = $delivery_date;
        $this->panolero_id = $panolero_id;
        $this->state_id = $state_id;
    }


    public function id(): ?int
    {
        return $this->id;
    }

    public function panolero_id(): int
    {
        return $this->panolero_id;
    }


    public function worker_id(): int
    {
        return $this->worker_id;
    }

    public function tool_id(): int
    {
        return $this->tool_id;
    }

    public function amount(): int
    {
        return $this->worker_id;
    }

    public function order_date(): DateTime
    {
        return $this->order_date;
    }

    public function delivery_date(): DateTime
    {
        return $this->delivery_date;
    }



    
}
