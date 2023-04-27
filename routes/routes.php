<?php

use app\Actions\HomeAction;
use app\Actions\TranslateAction;
use app\middlewares\CsrfTokenMiddleware;

$router->get('/', [HomeAction::class, 'index'], ['name' => 'home']);
$router->post(
    '/translate',
    [TranslateAction::class, 'translate'],
    [
        'name' => 'translate',
        'before' => CsrfTokenMiddleware::class
    ]
);
