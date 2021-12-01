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

        $message = json_encode($late);

        $this->mailer->send($message);
    }
}
