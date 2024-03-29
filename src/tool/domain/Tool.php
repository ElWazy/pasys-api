<?php

namespace LosYuntas\tool\domain;

use Exception;
use LosYuntas\shared\infrastructure\RandomString;

final class Tool 
{
    private ?int $id;
    private string $name;
    private int $categoryId;
    private ?array $image;
    private ?string $imagePath;
    private int $stock_total;
    private ?int $stock_actual;
    private ?string $location;

    public function __construct(
        int $id = null,
        string $name,
        int $categoryId,
        array $image = null,
        int $stock_total,
        int $stock_actual = null,
        string $location = null
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

        $this->irrealStock($stock_total, $stock_actual);
        $this->validLocation($location);

        $this->id = $id ?? null;
        $this->name = $name;
        $this->categoryId = $categoryId;
        $this->stock_total = $stock_total;
        $this->stock_actual = $stock_actual;
        $this->location = $location;
    }

    public function overloadStockActual(int $amount): bool
    {
        return $amount > $this->stock_actual;
    }

    public function discountStockActual(int $amount): void
    {
        $this->stock_actual -= $amount;
    }

    public function addStockActual(int $amount): void
    {
        $this->stock_actual += $amount;
    }

    private function irrealStock(int $stockTotal, int $stockActual): void
    {
        if ( $stockActual > $stockTotal ) {
            throw new Exception('El stock actual no puede ser mayor al stock total');
            return;
        }
    }

    private function validLocation(string $location): void
    {
        if ( !$location ) {
            throw new Exception('La ubicación está vacia');
            return;
        }

        if ( strlen($location) > 30 ) {
            throw new Exception('El nombre de la ubicación es demasiado largo');
            return;
        }
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

    public function stockActual(): int
    {
        return $this->stock_actual;
    }

    public function location(): string
    {
        return $this->location;
    }

    public function toPrimitives(): array 
    {
        return [
            'id' => $this->id(),
            'name' => $this->name(),
            'category_id' => $this->categoryId(),
            'stock_total' => $this->stockTotal(),
            'stock_actual' => $this->stockActual(),
            'location' => $this->location()
        ];
    }
}
