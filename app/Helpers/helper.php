<?php

declare(strict_types=1);

use app\Core\Facades\Config;

if (!function_exists('config')) {
    function config(string $key): array|string
    {
        return Config::get($key);
    }
}
