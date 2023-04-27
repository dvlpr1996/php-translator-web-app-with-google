<?php

use app\Core\Adapter\DotEnvAdapter;
use app\Core\Adapter\RouterAdapter;

define('BASE_APP_PATH', __DIR__ . '../../../');

require_once realpath(BASE_APP_PATH . 'vendor/autoload.php');

try {
    (new DotEnvAdapter(BASE_APP_PATH))->requiredElement();
} catch (Exception $e) {
    // todo: DotEnvAdapter exception
    die($e->getMessage());
}

require_once BASE_APP_PATH . 'app/Helpers/constants.php';

ini_set('display_errors', $_ENV['DISPLAY_ERRORS']);
ini_set('display_startup_errors', $_ENV['DISPLAY_STARTUP_ERRORS']);
error_reporting($_ENV['ERROR_REPORTING']);

$router = new RouterAdapter;
