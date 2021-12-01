<?php

namespace LosYuntas\order_record\infrastructure;

use LosYuntas\order_record\domain\OrderRecordMailer;

final class OrderRecordMailerInMemory implements OrderRecordMailer
{
    public function send(string $message): void
    {
        $mail = fopen("correo.txt", "w") or die("Unable to open file!");
        fwrite($mail, $message);
        fclose($mail);
    }
}
