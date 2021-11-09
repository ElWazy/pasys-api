<?php

namespace LosYuntas\tool\domain;

use Exception;
use LosYuntas\shared\domain\IntegerValueObject;
 
final class ToolId extends IntegerValueObject
{
    public function __construct(int $value) 
    {
        $this->isNegative($value);

        parent::__construct($value);
    }

    private function isNegative($value)
    {
        if ($value < 0) {
            throw new Exception('ID is negative');
        }
    }
}
