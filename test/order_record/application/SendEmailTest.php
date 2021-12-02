<?php

namespace LosYuntas\Test\order_record\application;

use LosYuntas\order_record\application\SendEmail;
use LosYuntas\order_record\infrastructure\OrderRecordMailerInMemory;
use LosYuntas\order_record\infrastructure\OrderRecordRepositoryInMemory;
use PHPUnit\Framework\TestCase;

final class SendEmailTest extends TestCase
{
    public function testIsEmailSended()
    {
        $mailer = new OrderRecordMailerInMemory();
        $repository = new OrderRecordRepositoryInMemory();

        $sender = new SendEmail($repository, $mailer);

        $this->assertSame(true, $sender->send());
    }
}
