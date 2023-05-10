<?php

declare(strict_types=1);

namespace app\Core\FlashMessage;

use app\Exceptions\SessionKeyNotFoundException;

class FlashMessage
{
    public static function set(string $key, array|string $value): void
    {
        $_SESSION['flash'][$key] = $value;
    }

    public static function get(string $key): mixed
    {
        return isset($_SESSION['flash'][$key])
            ? $_SESSION['flash'][$key]
            : false;
    }

    public static function clear(string $key): void
    {
        if (!isset($_SESSION['flash'][$key])) {
            throw new SessionKeyNotFoundException($key . ' Not Found');
        }
        unset($_SESSION['flash'][$key]);
    }

    public static function all(): array
    {
        return $_SESSION['flash'];
    }
}
