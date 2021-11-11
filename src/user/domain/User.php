<?php

namespace LosYuntas\user\domain;

use Exception;


final class User
{ 
    private int $id;
    private string $name;
    private string $password;
    private string $rut;
    private int $role_id;    

    public function __construct(string $name, string $password, string $rut, int $role_id) 
    {
        if (strlen($name) > 50)  {
            throw new Exception('El nombre de la categoria es demasiado largo');
        }

        if (!$name) {
            throw new Exception('Campo del nombre vacio');
        }

        $this->name = $name;
        $this->password = $password;
        $this->rut = $rut;
        $this->role_id = $role_id;

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

}