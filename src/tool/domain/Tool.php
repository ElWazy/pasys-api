<?php

namespace LosYuntas\tool\domain;

use Exception;

final class Tool 
{
    private string $name;
    private int $category;
    private string $image;
    private int $stock_total;

    public function __construct(
        string $name,
        int $category,
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
        $this->category = $category;
        $this->image = $image;
        $this->stock_total = $stock_total;
    }
}
