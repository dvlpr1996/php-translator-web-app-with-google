<?php

use app\Actions\HomeAction;

$router->get('/', [HomeAction::class, 'index'], ['name' => 'home']);
