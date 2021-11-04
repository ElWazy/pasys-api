<?php

namespace LosYuntas\tool\domain;

interface ToolRepository
{
    public function getAll(): ?array;

    public function getByName(string $name): ?array;

    public function add(Tool $tool): void;

    public function update(Tool $tool): void;

    public function remove(ToolId $id): void;
}
