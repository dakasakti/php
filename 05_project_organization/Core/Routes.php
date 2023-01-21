<?php

namespace Core;

class Routes
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = compact("method", "uri", "controller");
    }

    public function get($uri, $controller)
    {
        $this->add("GET", $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->add("POST", $uri, $controller);
    }

    public function put($uri, $controller)
    {
        $this->add("PUT", $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        $this->add("PATCH", $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        $this->add("DELETE", $uri, $controller);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($uri === $route["uri"] && strtoupper($method) === $route["method"]) {
                return require Helper::base_path($route['controller']);
            }
        }

        Helper::abort();
    }
}
