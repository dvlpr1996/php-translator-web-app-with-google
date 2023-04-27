<?php

declare(strict_types=1);

use app\Core\CsrfToken\Csrf;

require_once __DIR__ . '/../app/Bootstrap/init.php';
require_once __DIR__ . '/../routes/routes.php';

$csrf = new Csrf;

$router->runRouter();
