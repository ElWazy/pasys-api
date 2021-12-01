<?php

namespace LosYuntas\order_record\application;

use LosYuntas\order_record\domain\OrderRecordRepository;

final class SendEmail 
{
    private OrderRecordRepository $repository;

    public function __construct(OrderRecordRepository $repository) 
    {
        $this->repository = $repository;
    }

    public function send() : void
    {
        // $late = $this->repository->getLates();
        //
        // TODO: Implementar Correo Electronico
    }
}
