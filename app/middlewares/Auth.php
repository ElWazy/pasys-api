<?php

namespace LosYuntas\Application\middlewares;

session_start();

final class Auth 
{
    public static function isAdmin(): bool
    {
        // return isset($_SESSION['isActive']);
        return true;
    }

    public static function canEdit(): void
    {
        $isAdmin = true;
        if (!$isAdmin) {
            header('Location: /');
            exit;
        }
    }
}
