<?php

namespace LosYuntas\user\domain;

interface UserRepository
{
    public function login(string $rut, string $password): int;

    public function getAll(): ?array;

    public function getByCriteria(string $criteria): ?array;

    public function getByRut(string $rut): ?array;

    public function getById(int $id): ?array;

    public function add(User $user): void;

    public function update(User $user): void;

    public function remove(int $user): void;
}
