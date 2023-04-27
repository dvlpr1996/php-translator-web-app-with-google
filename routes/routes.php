<?php

use app\Actions\HomeAction;
use app\Actions\TranslateAction;

$router->get('/', [HomeAction::class, 'index'], ['name' => 'home']);
$router->post('/translate', [TranslateAction::class, 'translate'], ['name' => 'translate']);
