<?php

namespace LosYuntas\tool\domain;

use Exception;
use LosYuntas\shared\domain\StringValueObject;

final class ToolName extends StringValueObject
{
    public const CHARACTER_MAX = 1000;
        
    public function __construct(string $value)
    {
        $this->charactersLimit($value);
        $this->onlyLetters($value);

        parent::__construct($value);
    }

    private function charactersLimit(string $value): void
    {
        if (strlen($value) < CHARACTER_MAX) {
            throw new Exception('Superaste el límite de characteres permitidos');
        }
    }

    private function onlyLetters(string $value): void
    {
        // Validate that the name contains only letters (No Numbers)
    }
}
