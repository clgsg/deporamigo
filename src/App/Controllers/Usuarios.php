<?php

namespace App\Controllers;

use \App\Models\Usuario;
use Reusable\Viewer;
# Create class Usuarios
class Usuarios {
    public function view() {

        $model = new Usuario;

        # We call the getUserData method on the object $model and assign its value to $usuarios
        $usuarios = $model-> getUserData();

        $viewer = new Viewer;
        echo $viewer -> render("common/header.php");
        # Data is passed as an associative array
        echo $viewer->render("Usuarios/view.php", ["usuarios" => $usuarios]);

        # We require the view here, once $usuarios has been defined. 
        # If put at the beginning, $usuarios from view will not be available.
        #require "views/Usuarios/view.php";

    }

    public function show() {
        $viewer = new Viewer;
        echo $viewer -> render("common/header.php");
        echo $viewer -> render("Usuarios/show.php");
    }
}