<?php

# The .htaccess file forwards all requests after the URL path to the index.php file
# exit("Sending a message from index.php");
#echo "Index here!!!";
# Show the REQUEST_URI (i.e. path) when the index is requested WITHOUT the query string (PHP_URL_PATH argument)
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);


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
#$router->add("/usuarios/editar", ["controller" => "usuarios", "action" => "editar"]);
#$router->add("/usuarios/baja", ["controller" => "usuarios", "action" => "baja"]);
$router->add("/actividades/view", ["controller" => "actividades", "action" => "view"]);
$router->add("/actividades/show", ["controller" => "actividades", "action" => "show"]);
#$router->add("/actividades/editar_eliminar", ["controller" => "actividades", "action" => "editar_eliminar"]);
#$router->add("/actividades/inscribirse", ["controller" => "actividades", "action" => "inscribirse"]);

$params = $router->match($path);

if ($params === false) {
    exit("No route matches your request");
}

# Add path of namespace to $controller and turn name to initial uppercase (instead of hardcoding it in the list)
$controller= "App\Controllers\\" . ucwords($params["controller"]);
$action=$params["action"];


# By converting the query word into a variable, we can change it dynamically
#require "./src/controllers/$controller.php";

# Dynamically creating an object of the type defined in $controller
$controller_object = new $controller;

# We call the method defined as $action in the query string for the controller
$controller_object->$action();




#check whcat params are passed
#var_dump($params);
#exit;

# Divide the value of $path into segments by slashes
#$segments = explode("/", $path);


# Check position of values entered into URL
# print_r($segments);
# exit;
# Get the $action (pos. 5) and $controller (pos.4) values from the exploded URL PATH
# URL = http://localhost/univr_PROYECTO/web_proyecto/controller/action/index.php
# Array ( [0] => [1] => univr_PROYECTO [2] => web_proyecto [3] => controller [4] => action [5] => index.php )
#$controller = $segments[2];
#$action = $segments[3];
#print_r($controller);
#print_r($action);






# Use the $action and $controller variables from the query string
# $action = $_GET["action"];
# $controller = $_GET["controller"];


# Show the SERVER array
# print_r($_SERVER);
# exit;

/*  =================================================
            LO MISMO, PERO EN VERSIÓN TORPE:
===================================================
Método TORPE para determinar si se usa la función index de un controlador o de otro
if ($action === "index") {
    $controller->index();
} elseif ($action === "show") {
    $controller->show();
} elseif ($action === "home") {
    $controller->index();
}
Habría que duplicar la condición para las acciones y crear un objeto Usuario y otro Actividad ...

 */

