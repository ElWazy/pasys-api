<?php

namespace LosYuntas\order_record\domain;

interface OrderRecordMailer
{
    public function send(string $message): bool;
}
