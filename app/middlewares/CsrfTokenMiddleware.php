<?php

namespace app\middlewares;

use Buki\Router\Http\Middleware;
use Symfony\Component\HttpFoundation\Request;

class CsrfTokenMiddleware extends Middleware
{
    public function handle(Request $request)
    {
        if (empty($_SESSION['key']) || $request->get('csrf') === '') {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            return false;
        }

        if (time() >= $_SESSION['key-expire']) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            return false;
        }

        if ($_SESSION['key'] !== $request->get('csrf')) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            return false;
        }

        unset($_SESSION['key'], $_SESSION['key-expire']);

        return true;
    }
}
