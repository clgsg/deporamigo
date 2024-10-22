<?php

# The .htaccess file forwards all requests after the URL path to the index.php file
declare(strict_types=1);

use Reusable\Exceptions\Exception404;


set_exception_handler(function(Throwable $exception)
{
    # To log errors in default file
    ini_set("log_errors", "1");
    # To avoid showing information about our app if there's an error
    ini_set("display_errors", "0");
    
    # To display the full path to the error log:   C:\xampp\php\logs\php_error_log
    # echo ini_get("error_log");
    
    # To show our custom view with an error message
    require "views/common/error.php";

    throw $exception;
});





# Show the REQUEST_URI (i.e. path) when the index is requested WITHOUT the query string (PHP_URL_PATH argument)
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if($path === false)
{
    throw new UnexpectedValueException("La URL introducida '{$_SERVER["REQUEST_URI"]}' no tiene el formato esperado.");
}

# Autoloader uses namespaces to 'complete' the path to the appropriate file
spl_autoload_register(function (string $class_name) {
    # Since backslash only works in Windows, we replace all baskslashes in $class_name with normal slashes
    require "src/" . str_replace("\\", "/", $class_name) . ".php";
});

$router = new Reusable\Router;
# controller=class; action=method
$router->add("/", ["controller" => "home", "action" => "index"]);
$router->add("/home", ["controller" => "home", "action" => "index"]);
$router->add("/usuarios", ["controller" => "usuarios", "action" => "view"]);
$router->add("/usuarios/show", ["controller" => "usuarios", "action" => "show"]);
$router->add("/actividades/view", ["controller" => "actividades", "action" => "view"]);
$router->add("/actividades/show", ["controller" => "actividades", "action" => "show"]);

$params = $router->match($path);

if ($params === false) {
    throw new Exception404("No se encontraron rutas para '$path'", 404);
}
#function __construct(string $message = "", int $code = 0, Throwable $previous = null) 
# Add path of namespace to $controller and turn name to initial uppercase (instead of hardcoding it in the list)
$controller= "App\Controllers\\" . ucwords($params["controller"]);
$action=$params["action"];

# Dynamically creating an object of the type defined in $controller
$controller_object = new $controller;

# We call the method defined as $action in the query string for the controller
$controller_object->$action();