<?php
# The .htaccess file forwards all requests after the URL path to the index.php file

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
$router->add("/usuarios", ["controller" => "usuarios", "action" => "view"]);
$router->add("/usuarios/view", ["controller" => "usuarios", "action" => "view"]);
$router->add("/usuarios/signup", ["controller" => "usuarios", "action" => "signup"]);
$router->add("/usuarios/pwd", ["controller" => "usuarios", "action" => "retrieve_pwd"]);
$router->add("/login", ["controller" => "usuarios", "action" => "login"]);
$router->add("/usuarios/show", ["controller" => "usuarios", "action" => "show"]);

$router->add("/actividades/view", ["controller" => "actividades", "action" => "view"]);
$router->add("/actividades", ["controller" => "actividades", "action" => "view"]);
$router->add("/actividades/show", ["controller" => "actividades", "action" => "show"]);
$router->add("/actividades/add", ["controller" => "actividades", "action" => "add"]);
$router->add("/actividades/edit", ["controller" => "actividades", "action" => "editActivity"]);

$params = $router->match($path);

if ($params === false) {
    throw new UnexpectedValueException("No se encontraron rutas para '$path'", 404);
}

#function __construct(string $message = "", int $code = 0, Throwable $previous = null) 
# Add path of namespace to $controller and turn name to initial uppercase (instead of hardcoding it in the list)
$controller= "App\Controllers\\" . ucwords($params["controller"]);
$action=$params["action"];

# Dynamically creating an object of the type defined in $controller
$controller_object = new $controller;

# We call the method defined as $action in the query string for the controller
$controller_object->$action();

