<?php

namespace LosYuntas\tool\domain;

use Exception;

final class Tool 
{
    private string $name;
    private int $categoryId;
    private string $image;
    private int $stock_total;

    public function __construct(
        string $name,
        int $categoryId,
        string $image,
        int $stock_total
    )
    {
        if (!$name) {
            throw new Exception('Nombre de la herramienta vacio');
        }

        if (strlen() > 50) {
            throw new Exception('Nombre de la herramienta demasiado largo');
        }

        if ($category < 0) {
            throw new Exception('El id de la categoria no puede ser negativo');
        }

        $this->name = $name;
        $this->categoryId = $categoryId;
        $this->image = $image;
        $this->stock_total = $stock_total;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function categoryId(): int
    {
        return $this->categoryId;
    }

    public function image(): string
    {
        return $this->image;
    }

    public function stockTotal(): int
    {
        return $this->stock_total;
    }
}
