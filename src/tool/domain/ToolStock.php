<?php

namespace LosYuntas\tool\domain;

use Exception;

final class ToolStock
{
    private int $total;
    private int $actual;

    public function __construct(int $total, int $actual)
    {
        $this->isNegative($total);
        $this->isNegative($actual);

        $this->isGreater($total, $actual);

        $this->total  = $total;
        $this->actual = $actual;
    }

    private function isNegative(int $value): void
    {
        if ($value < 0) {
            throw new Exception('El Stock no puede ser negativo');
        }
    }

    private function isGreater(int $total, int $actual): void
    {
        if ($total > $actual) {
            throw new Exception('El stock actual no puede ser mayor que el stock total');
        }
    }
}
