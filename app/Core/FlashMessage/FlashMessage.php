<?php

declare(strict_types=1);

namespace app\Core\FlashMessage;

class FlashMessage
{
    public static function set(string $key, string $value): void
    {
        $_SESSION['flash'][$key] = $value;
    }

    public static function get(string $key): mixed
    {
        return $_SESSION['flash'][$key];
    }
    public static function clear(string $key): void
    {
        unset($_SESSION['flash'][$key]);
    }
    public static function all(): array
    {
        return $_SESSION['flash'];
    }
}
