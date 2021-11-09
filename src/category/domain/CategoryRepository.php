<?php

namespace LosYuntas\category\domain;

interface CategoryRepository 
{
    public function getAll(): ?array;

    public function getByName(string $name): ?array;

    public function add(Category $category): void;

    public function remove(int $id): void;
}