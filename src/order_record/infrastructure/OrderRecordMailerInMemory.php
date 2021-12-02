<?php

namespace LosYuntas\order_record\infrastructure;

use LosYuntas\order_record\domain\OrderRecordMailer;

final class OrderRecordMailerInMemory implements OrderRecordMailer
{
    public function send(string $message): bool
    {
        $mail = fopen("correo.txt", "w") or die("Unable to open file!");
        fwrite($mail, $message);
        fclose($mail);

        return file_exists('correo.txt');
    }
}
