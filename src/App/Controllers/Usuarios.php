<?php

namespace App\Controllers;

use \App\Models\Usuario;
use Common\Viewer;
# Create class Usuarios
class Usuarios {
    public function view() {

        $model = new Usuario;
        # We call the getUserData method on the object $model and assign its value to $usuarios
        $usuarios = $model-> getUserData();

        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Usuarios"]);
        # Data is passed as an associative array
        echo $viewer->render("Usuarios/view.php", ["usuarios" => $usuarios]);

    }

    public function show() {
        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Usuarios"]);
        echo $viewer -> render("Usuarios/show.php");
    }
}