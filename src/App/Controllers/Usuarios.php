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
        echo $viewer -> render("common/footer.php");
    }

    public function show() {
        $model = new Usuario;
        # We call the getUserData method on the object $model and assign its value to $usuarios
        $usuarios = $model-> getUserData();

        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Usuarios"]);
        echo $viewer -> render("Usuarios/show.php");
        echo $viewer -> render("common/footer.php");
    }
    public function signup() {
        $model = new Usuario;
        # We call the getUserData method on the object $model and assign its value to $usuarios
        $usuarios = $model-> getUserData();

        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Darse de alta"]);
        echo $viewer -> render("Usuarios/signup.php");
        echo $viewer -> render("common/footer.php");
    }

    public function login() {
        $model = new Usuario;
        # We call the getUserData method on the object $model and assign its value to $usuarios
        $usuarios = $model-> getUserData();

        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Acceso"]);
        echo $viewer -> render("Usuarios/login.php");
        echo $viewer -> render("common/footer.php");
    }
}