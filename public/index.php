<?php

declare(strict_types=1);

define("ROOT_PATH", dirname(__DIR__));

# Autoloader uses namespaces to 'complete' the path to the appropriate file
spl_autoload_register(function (string $class_name) {
    # Since backslash only works in Windows, we replace all baskslashes in $class_name with normal slashes
    require ROOT_PATH . "/src/" . str_replace("\\", "/", $class_name) . ".php";
});

$dotenv = new Common\Dotenv;
$dotenv->load(ROOT_PATH . "/.env");

set_error_handler("Common\ErrorHandler::handleError");
set_exception_handler("Common\ErrorHandler::handleException");

# Show the REQUEST_URI (i.e. path) when the index is requested WITHOUT the query string (PHP_URL_PATH argument)
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if($path === false)
{
    throw new UnexpectedValueException("La URL introducida '{$_SERVER["REQUEST_URI"]}' no tiene el formato esperado.");
}

$router = new Common\Router;
# controller=class; action=method

$router->add("/", ["controller" => "home", "action" => "index"]);
$router->add("/home", ["controller" => "home", "action" => "index"]);
$router->add("/usuarios", ["controller" => "usuarios", "action" => "ver"]);
$router->add("/actividades", ["controller" => "actividades", "action" => "verTodas"]);
$router->add("/{controller}/{action}");

$router->add("/usuarios/ver", ["controller" => "usuarios", "action" => "ver"]);
$router->add("/usuarios/registrarse", ["controller" => "usuarios", "action" => "registrarse"]);
$router->add("/usuarios/pwd", ["controller" => "usuarios", "action" => "pwd"]);
$router->add("/usuarios/acceso", ["controller" => "usuarios", "action" => "acceder"]);
$router->add("/usuarios/mostrar", ["controller" => "usuarios", "action" => "mostrar"]);

$router->add("/actividades/ver", ["controller" => "actividades", "action" => "verTodas"]);
$router->add("/actividades/mostrar", ["controller" => "actividades", "action" => "mostrar"]);
$router->add("/actividades/crear", ["controller" => "actividades", "action" => "crear"]);
$router->add("/actividades/editar", ["controller" => "actividades", "action" => "editar"]);
$router->add("/actividades/eliminar", ["controller" => "actividades", "action" => "eliminar"]);
#$router->add("/{controller}/{id}/{action}");

$params = $router->match($path);

if ($params === false) {
    exit("No se encontraron rutas para '$path'");
}

# Add path of namespace to $controller and turn name to initial uppercase (instead of hardcoding it in the list)
$controller = "App\Controllers\\" . ucwords($params["controller"]);
$action = $params["action"];

# Dynamically creating an object of the type defined in $controller
$controller_object = new $controller;

# We call the method defined as $action in the query string for the controller
$controller_object->$action();