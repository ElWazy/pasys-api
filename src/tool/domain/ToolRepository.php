<?php

namespace LosYuntas\tool\domain;

interface ToolRepository
{
    public function getAll(): ?array;

    public function getByCriteria(string $criteria): ?array;

    public function getById(int $id): ?array;

    public function add(Tool $tool): void;

    public function update(Tool $tool): void;

    public function remove(int $tool): void;
}
