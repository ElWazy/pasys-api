<?php

namespace LosYuntas\role\domain;

final class Role 
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
