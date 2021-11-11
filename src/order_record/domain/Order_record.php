<?php

namespace LosYuntas\order_record\domain;

use DateTime;
use Exception;

final class Order_record
{

    private int $id;
    private int $worker_id;
    private int $tool_id;
    private int $amount;
    private DateTime $order_date;
    private DateTime $delivery_date;
    private int $panolero_id;
    private int $state_id;

    //no tiene name
    public function __construct($name) 
    {
        if (strlen($name) > 50)  {
            throw new Exception('El nombre de la categoria es demasiado largo');
        }

        if (!$name) {
            throw new Exception('Campo del nombre vacio');
        }
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }
}
