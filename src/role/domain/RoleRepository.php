<?php

namespace LosYuntas\role\domain;

interface RoleRepository
{
    public function getAll(): ?array;

    public function getByName(string $name): ?array;

    public function add(Role $role): void;

    public function remove(int $id): void;
}