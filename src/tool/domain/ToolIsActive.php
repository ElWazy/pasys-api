<?php 

namespace LosYuntas\tool\domain;

final class ToolIsActive
{
    private bool $value;

    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    public function value(): bool
    {
        return $this->value;
    }
}

