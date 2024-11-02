<?php

namespace Common;

class Dispatcher
{

    public function __construct(private Router $router) {}

    public function handle(string $path)
    {
        $params = $this->router->match($path);

        if ($params === false) {
            exit("No se encontraron rutas para '$path'");
        }

        $action = $params["action"];
        # Add path of namespace to $controller and turn name to initial uppercase (instead of hardcoding it in the list)
        $controller = "App\Controllers\\" . ucwords($params["controller"]);

        # Dynamically creating an object of the type defined in $controller
        $controller_object = new $controller;

        # We call the method defined as $action in the query string for the controller
        $controller_object->$action();
    }
}
