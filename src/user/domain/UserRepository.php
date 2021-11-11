<?php

namespace LosYuntas\user\domain;

interface UserRepository
{
    public function getAll(): ?array;

    public function getByCriteria(string $criteria): ?array;

    public function add(User $user): void;

    public function update(User $user): void;

    public function remove(int $user): void;

    
}