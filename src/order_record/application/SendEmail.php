<?php

namespace LosYuntas\order_record\application;

use LosYuntas\order_record\domain\OrderRecordMailer;
use LosYuntas\order_record\domain\OrderRecordRepository;

final class SendEmail 
{
    private OrderRecordRepository $repository;
    private OrderRecordMailer $mailer;

    public function __construct(
        OrderRecordRepository $repository,
        OrderRecordMailer $mailer
    ) 
    {
        $this->repository = $repository;
        $this->mailer = $mailer;
    }

    public function send() : void
    {
        $late = $this->repository->getLates();

        if (!$late) $this->mailer->send('No hay Atrasos');

        $message = "## Atrasos ##\n\n";
        foreach ($late as $order) {
            $message .= 
                "\nCódigo Consulta: "       . $order["id"] 
                . "\nNombre: "              . $order["trabajador"] 
                . "\nRut: "                 . $order["rut"] 
                . "\nHerramienta: "         . $order["herramienta"] 
                . "\nCantidad: "            . $order["amount"] 
                . "\nFecha de Pedido: "     . $order["order_date"] 
                . "\nFecha de Devolución: " . $order["deadline"] 
                . "\nFecha Actual: "        . date('Y-m-d')
                . "\nPañolero: "            . $order["panolero"] 
                . "\n------------------------\n\n";
        }

        $this->mailer->send($message);
    }
}
