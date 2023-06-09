<?php

declare(strict_types=1);

use app\Core\Facades\Blade;
use app\Core\Facades\Config;
use app\Core\FlashMessage\FlashMessage;
use app\Exceptions\ConfigKeyNotFoundException;
use app\Exceptions\ConfigFileNotFoundException;
use app\Exceptions\SessionKeyNotFoundException;
use app\Exceptions\ViewFileDoesNotExistsException;

if (!function_exists('config')) {
    function config(string $key)
    {
        try {
            return Config::get($key);
        } catch (ConfigFileNotFoundException $e) {
            displayError($e->getMessage());
        } catch (ConfigKeyNotFoundException $e) {
            displayError($e->getMessage());
        } catch (Exception $e) {
            displayError($e->getMessage());
        }
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
        try {
            global $csrf;
            $csrf->createCsrfToken();
            return Blade::display($path, $data);
        } catch (ViewFileDoesNotExistsException $e) {
            displayError($e->getMessage());
        } catch (Exception $e) {
            displayError($e->getMessage());
        }
    }
}

if (!function_exists('csrfTokenInput')) {
    function csrfTokenInput()
    {
        global $csrf;
        return $csrf->csrfTokenInput();
    }
}

if (!function_exists('displayError')) {
    function displayError($msg)
    {
        echo "<pre style='color: #9c4100; background: #eee; z-index: 999; position: relative; padding: 10px; margin: 10px; border-radius: 5px; border-left: 3px solid #c56705;'>";
        echo $msg;
        echo "</pre>";
        die;
    }
}


if (!function_exists('asset')) {
    function asset(string $path): string
    {
        return $path;
    }
}

if (!function_exists('route')) {
    function route(string $path)
    {
        global $router;
        foreach ($router->getAllRoutes() as $route) {
            if (trim($path) === $route['name']) {
                return BASE_URL . $route['route'];
            }
        }
        return $router->dispatch404();
    }
}

if (!function_exists('back')) {
    function back(int $response_code = 0)
    {
        header('Location: ' . $_SERVER['HTTP_REFERER'], response_code: $response_code);
    }
}

// flash message helpers
if (!function_exists('session')) {
    function getSession(string $key)
    {
        if (!empty(FlashMessage::get($key)) && FlashMessage::get($key)) {
            return FlashMessage::get($key);
        }
        return [];
    }
}

if (!function_exists('setSession')) {
    function setSession(string $key, array|string $value)
    {
        FlashMessage::set($key, $value);
    }
}

if (!function_exists('delSession')) {
    function delSession(string $key)
    {
        try {
            FlashMessage::clear($key);
        } catch (SessionKeyNotFoundException $e) {
            displayError($e->getMessage());
        }
    }
}
