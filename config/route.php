<?php

return [
    'base_folder' => realpath(BASE_PATH . 'public/'),
    'main_method' => 'index',
    'paths' => [
        'controllers' => realpath(BASE_PATH . 'app/Actions'),
        'middlewares' => realpath(BASE_PATH . 'app/middlewares')
    ],
    'namespaces' => [
        'controllers' => 'app\Actions',
        'middlewares' => 'app\middlewares'
    ],
    'debug' => $_ENV['ROUTER_DEBUG'],
    'cache' => realpath(BASE_PATH . 'storage/cache/router.php')
];
