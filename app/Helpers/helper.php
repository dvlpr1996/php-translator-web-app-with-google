<?php

declare(strict_types=1);

use app\Core\Facades\Blade;
use app\Core\Facades\Config;

if (!function_exists('config')) {
    function config(string $key): array|string
    {
        return Config::get($key);
    }
}

if (!function_exists('checkFileExists')) {
    function checkFileExists(string $path): bool
    {
        if (!file_exists($path) && !is_file($path) && !is_readable($path))
            return false;
        return true;
    }
}

if (!function_exists('view')) {
    function view(string $path, array $data = [])
    {
        return Blade::display($path, $data);
    }
}

if (!function_exists('displayError')) {
    function displayError($msg)
    {
        echo "<pre style='color: #9c4100; background: #eee; z-index: 999; position: relative; padding: 10px; margin: 10px; border-radius: 5px; border-left: 3px solid #c56705;'>";
        echo $msg;
        echo "</pre>";
    }
}

if (!function_exists('asset')) {
    function asset(string $path)
    {
        return $path;
    }
}
