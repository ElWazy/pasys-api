<?php

namespace LosYuntas\category\domain;

use Exception;

final class Category
{
    private int $id;
    private string $name;

    public function __construct($name) 
    {
        if (strlen($name) > 50)  {
            throw new Exception('El nombre de la categoria es demasiado largo');
        }

        if (!$name) {
            throw new Exception('Campo del nombre vacio');
        }
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }
}
