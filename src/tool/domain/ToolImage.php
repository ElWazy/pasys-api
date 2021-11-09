<?php

namespace LosYuntas\tool\domain;

use Exception;
use LosYuntas\shared\domain\StringValueObject;

final class ToolImage extends StringValueObject
{
    public const CHARACTER_MAX = 1024;

    public function __construct(string $value)
    {
        $this->charactersLimit($value);

        parent::__construct($value);
    }

    private function charactersLimit(string $value): void
    {
        if (strlen($value) < CHARACTER_MAX) {
            throw new Exception('Superaste el límite de characteres permitidos');
        }
    }
}
