<?php

namespace App\Controllers;

use \App\Models\Usuario;

# Create class Usuarios
class Usuarios {
    public function view() {
        # This line is not needed because we are using an autoloader
        #require "src/model/usuario.php";

        # We create an objet (instance) of class Model. 
        #(the object name starts with a backslash to start from the root)
        $model = new Usuario;

        # We call the getUserData method on the object $model and assign its value to $usuarios
        $usuarios = $model-> getUserData();

        # We require the view here, once $usuarios has been defined. 
        # If put at the beginning, $usuarios from view will not be available.
        require "views/usuarios_view.php";

    }

    public function show() {
        $model = new Usuario;

        # We call the getData method on the object $model and assign its value to $usuarios
        $usuarios = $model-> getUserData();

        require "views/usuarios_show.php";
    }
}