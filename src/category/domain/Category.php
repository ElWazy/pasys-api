<?php

namespace LosYuntas\category\domain;

final class Category
{
    private int $id;
    private string $name;

    public function __construct($name) 
    {
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }
}
