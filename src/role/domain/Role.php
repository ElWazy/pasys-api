<?php

namespace LosYuntas\role\domain;

use Exception;

final class Role 
{
    private int $id;
    private string $name;

    public function __construct($name) 
    {
        if (!$name) {
            throw new Exception('Campo del nombre vacio');
        }

        if (strlen($name) > 50) {
            throw new Exception('El nombre del rol es demasiado largo');
        }

        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }
}
