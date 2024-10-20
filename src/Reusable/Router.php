<?php

namespace Reusable;

class Router {
    private array $routes=[];

    public function add(string $path, array $params): void 
    {

        $this->routes[] = [
            "path" => $path,
            "params" => $params
        ];
    }
    # This function can return an array or a boolean
    public function match(string $path): array|bool
    {
        foreach ($this->routes as $route){
            # If a given route-path matches $path, return its parameters
            if ($route["path"] === $path) {
                return $route["params"];
            }
        }
        return false;
    }
}