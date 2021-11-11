<?php

namespace LosYuntas\user\domain;

use Exception;


final class User
{ 
    private ?int $id;
    private string $name;
    private string $password;
    private string $rut;
    private ?int $role_id;    

    public function __construct(int $id  = null , string $name, string $password, string $rut, int $role_id, int $is_active = null) 
    {
        if (strlen($name) > 50)  {
            throw new Exception('El nombre de la categoria es demasiado largo');
        }

        if (!$name) {
            throw new Exception('Campo del nombre vacio');
        }

        $this->id = $id ?? null;
        $this->name = $name;
        $this->password = $password;
        $this->rut = $rut;
        $this->role_id = $role_id;
        $this->is_active = $is_active ?? null;
    } 
    
    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function rut(): string
    {
        return $this->rut;
    }
    
    public function role_id(): int
    {
        return $this->role_id;
    }

    public function is_active(): ?int
    {
        return $this->is_active;
    }
}