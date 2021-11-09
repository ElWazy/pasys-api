<?php

namespace LosYuntas\shared\domain;

abstract class IntegerValueObject
{
    protected int $value;
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value();
    }
}
