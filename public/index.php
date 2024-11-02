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
$router->add("/{controller}/{action}");
$router->add("/{controller}/{id}/{action}");
/*
$router->add("/", ["controller" => "home", "action" => "index"]);
$router->add("/home", ["controller" => "home", "action" => "index"]);
$router->add("/usuarios", ["controller" => "usuarios", "action" => "ver"]);
$router->add("/usuarios/ver", ["controller" => "usuarios", "action" => "ver"]);
$router->add("/usuarios/registrarse", ["controller" => "usuarios", "action" => "registrarse"]);
$router->add("/usuarios/pwd", ["controller" => "usuarios", "action" => "pwd"]);
$router->add("usuarios/acceso", ["controller" => "usuarios", "action" => "acceso"]);
$router->add("/usuarios/mostrar", ["controller" => "usuarios", "action" => "mostrar"]);

$router->add("/actividades/ver", ["controller" => "actividades", "action" => "ver"]);
$router->add("/actividades", ["controller" => "actividades", "action" => "ver"]);
$router->add("/actividades/mostrar", ["controller" => "actividades", "action" => "mostrar"]);
$router->add("/actividades/nueva", ["controller" => "actividades", "action" => "nuevaActividad"]);
$router->add("/actividades/editar", ["controller" => "actividades", "action" => "editarActividad"]);
*/

$dispatcher = new Common\Dispatcher($router);

# Llamamos el método 'handle' del dispatcher y le pasamos la ruta $path
$dispatcher->handle($path);