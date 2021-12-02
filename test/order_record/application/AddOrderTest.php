<?php

namespace LosYuntas\Test\order_record\application;

use PHPUnit\Framework\TestCase;

final class AddOrderTest extends TestCase
{
    public function testShouldBeTrue()
    {
        $stack = [];
        $this->assertSame(0, count($stack));
    }
}
