<?php

namespace app\Core\Adapter;

use Buki\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RouterAdapter
{
    private Router $router;
    private array $config;

    public function __construct()
    {
        $this->config = config('route');
        $this->router = new Router($this->config);
    }

    public function get(string $route, array $action, array $options = [])
    {
        return $this->router->GET($route, $action, $options);
    }

    public function post(string $route, array $action, array $options = [])
    {
        return $this->router->POST($route, $action, $options);
    }

    public function routerConfig(): array
    {
        return $this->config;
    }

    public function getAllRoutes()
    {
        return $this->router->getRoutes();
    }

    public function runRouter()
    {
        $this->dispatch404();
        $this->displayError();
        return $this->router->run();
    }

    private function dispatch404()
    {
        return $this->router->notFound(function () {
            header("HTTP/1.0 404 Not Found");
            displayError('404 page not found');
            die;
        });
    }

    private function displayError()
    {
        return $this->router->error(function (Request $request, Response $response, \Exception $e) {
            displayError($e->getMessage());
            die;
        });
    }
}
