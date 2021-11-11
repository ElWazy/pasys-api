<?php

namespace LosYuntas\tool\domain;

use Exception;
use LosYuntas\shared\infrastructure\RandomString;

final class Tool 
{
    private ?int $id;
    private string $name;
    private int $categoryId;
    private array $image;
    private ?string $imagePath;
    private int $stock_total;

    public function __construct(
        int $id = null,
        string $name,
        int $categoryId,
        array $image,
        int $stock_total
    )
    {
        if (!$name) {
            throw new Exception('Nombre de la herramienta vacio');
        }

        if (strlen($name) > 50) {
            throw new Exception('Nombre de la herramienta demasiado largo');
        }

        if ($categoryId < 0) {
            throw new Exception('El id de la categoria no puede ser negativo');
        }

        if ( !is_dir(__DIR__ . '/../../../app/public/images') ) {
            mkdir(__DIR__ . '/../../../app/public/images');
        }

        $this->image = $image;
        $this->imagePath = '';

        if ($this->image && $this->image['tmp_name']) {
            if ($this->imagePath) {
                unlink(__DIR__ . '/../../../app/public/' . $this->imagePath);
            }
            
            $this->imagePath = 'images/' . RandomString::randomize(8) . '/' . $this->image['name'];
            mkdir(dirname(__DIR__ . '/../../../app/public/' . $this->imagePath));
            move_uploaded_file($this->image['tmp_name'], __DIR__ . '/../../../app/public/' . $this->imagePath);
        }

        $this->id = $id ?? null;
        $this->name = $name;
        $this->categoryId = $categoryId;
        $this->stock_total = $stock_total;
    }

    public function id(): ?int
    {
        return $this->id;
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
        return $this->imagePath;
    }

    public function stockTotal(): int
    {
        return $this->stock_total;
    }
}
