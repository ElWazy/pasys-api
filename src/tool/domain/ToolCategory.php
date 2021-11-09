<?php

namespace LosYuntas\tool\domain;

use LosYuntas\shared\domain\StringValueObject;

final class ToolCategory extends StringValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);
    }
}
