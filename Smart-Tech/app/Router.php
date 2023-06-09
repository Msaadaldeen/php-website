<?php

namespace App;

use App\Controllers\HomeController;
use App\Controllers\NOtFoundController;

class Router
{
    private string $controller = HomeController::class;
    private string $method = 'index';
    private array $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        if (empty($url)) return;

        $requestedController = 'App\\Controllers\\' . ucfirst(strtolower($url[0] ?? '')) . 'Controller';

        if (!class_exists($requestedController)) {
            $this->controller = NotFoundController::class;
            return;
        }

        $this->controller = $requestedController;
        unset($url[0]);

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }


        $this->params = array_values($url);
    }

    private function parseUrl(): array
    {
        if (!isset($_GET['url'])) {
            return [];
        }

        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);

        return $url;
    }

    public function getRequstedController(): string
    {
        return $this->controller;
    }

    public function getRequestedMethod(): string
    {
        return $this->method;
    }

    public function getParams(): array
    {
        return $this->params;
    }
}
