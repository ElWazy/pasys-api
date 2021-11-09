<?php

namespace LosYuntas\tool\domain;

final class Tool
{
    private ?ToolId $id;
    public ToolName $name;
    private ToolCategory $category;
    private ToolImage $image;
    private ToolStock $stock;
    private ToolIsActive $isActive;

    public function __constructor(
        ?ToolId $id,
        ToolName $name,
        ToolCategory $category,
        ToolImage $image,
        ToolStock $stock,
        ToolIsActive $isActive
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->image = $image;
        $this->stock = $stock;
        $this->isActive = $isActive;
    }

    public function name(): string
    {
        return $this->name->value();
    }
}
