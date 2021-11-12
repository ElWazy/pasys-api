<?php

namespace LosYuntas\Application\middlewares;

session_start();

final class Auth 
{
    public static function isAdmin(): bool
    {
        return isset($_SESSION['isActive']);
    }

    public static function canEdit(): void
    {
        if (!self::isAdmin()) {
            header('Location: /');
            exit;
        }
    }
}
