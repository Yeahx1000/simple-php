<?php

namespace App\Core;

use RuntimeException;

/**
 * Router class
 * 
 * This class represents a router for the project.
 */

final class Router
{
    private array $routes = [];

    public function get(string $path, callable|array $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, callable|array $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch(Request $request): string
    {
        $handler = $this->routes[$request->method][$request->path] ?? null;

        if (!$handler) {
            http_response_code(404);
            return 'Not Found';
        }

        if (is_array($handler)) {
            [$controller, $method] = $handler;
            return (new $controller())->$method();
        }

        return $handler();
    }
}