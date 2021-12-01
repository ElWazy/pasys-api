<?php

namespace LosYuntas\role\infrastructure;

use LosYuntas\role\domain\Role;
use LosYuntas\role\domain\RoleRepository;

final class RoleRepositoryInMemory implements RoleRepository
{
    public function getAll(): ?array
    {
        return [
            ['id' => 1, 'name' => 'gafer'],
            ['id' => 2, 'name' => 'panolero'],
            ['id' => 3, 'name' => 'motociclista']
        ];
    }

    public function getByName(string $name): ?array
    {
    }

    public function add(Role $role): void
    {
    }

    public function remove(int $id): void
    {
    }
}
