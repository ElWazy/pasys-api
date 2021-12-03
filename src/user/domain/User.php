<?php

namespace LosYuntas\user\domain;

use Exception;
use function valid;

final class User
{ 
    private ?int $id;
    private string $name;
    private ?string $password;
    private string $rut;
    private ?int $role_id;    
    private ?int $is_active;    

    public function __construct(
        int $id = null, 
        string $name,
        string $password = null,
        string $rut,
        int $role_id, 
        int $is_active = null
    ) 
    {
        if (strlen($name) > 50)  {
            throw new Exception('El nombre de la categoria es demasiado largo');
        }

        if (!$name) {
            throw new Exception('Campo del nombre vacio');
        }

        $this->rutValidation($rut);

        $this->id = $id ?? null;
        $this->name = $name;
        $this->password = $password ?? null;
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

    public function password(): ?string
    {
        return $this->password;
    }

    public function changePassword(string $password): void
    {
        if (!$password) {
            throw new Exception('Contraseña Vacia');
            return;
        }

        $this->password = $password;
    }

    private function rutValidation(string $rut): void
    {

        $rutFormateado = "";
        $rut = preg_replace('/[^k0-9]/i', '', $rut);

        if( strlen($rut) > 9 ){
            throw new Exception('Rut demasiado largo');
            return;
        }

        if( strlen($rut) < 8 ){
            throw new Exception('Rut demasiado corto');
            return;
        }

        $rutBody = substr($rut, 0, strlen($rut) - 1);

        if(strpos($rutBody , 'k') || strpos($rutBody , 'K')){
            throw new Exception('Rut Invalido');
            return;
        }

        if(strlen($rut) == 9) {
            $rutf = substr($rut, 0, 2);
            $rutm = substr($rut, 2, 3);
            $rutr = substr($rut, 5, 3);

            $ruti = substr($rut, 8);
            $rutFormateado = sprintf("%s.%s.%s-%s", $rutf, $rutm, $rutr, $ruti);
        } elseif (strlen($rut) == 8) {
            $rutf = substr($rut, 0, 1);
            $rutm = substr($rut, 1, 3);
            $rutr = substr($rut, 4, 3);

            $ruti = substr($rut, 7);
            $rutFormateado = sprintf("%s.%s.%s-%s", $rutf, $rutm, $rutr, $ruti);
        }

        $this->rut = $rutFormateado;
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

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id(),
            'name' => $this->name(),
            'rut' => $this->rut(),
            'role_id' => $this->role_id()
        ];
    }
}
