<?php

namespace App\Controllers;

use \App\Models\Usuario;
use Common\Viewer;
# Create class Usuarios
class Usuarios {
    public function ver() {

        $model = new Usuario;
        # We call the getUserData method on the object $model and assign its value to $usuarios
        $usuarios = $model-> getUserData();

        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Usuarios"]);
        # Data is passed as an associative array
        echo $viewer->render("Usuarios/ver.php", ["usuarios" => $usuarios]);
        echo $viewer -> render("common/footer.php");
    }

    public function mostrar() {
       
        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Usuarios"]);
        echo $viewer -> render("Usuarios/mostrar.php");
        echo $viewer -> render("common/footer.php");
    }
    public function registrarse() {

        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Darse de alta"]);
        echo $viewer -> render("Usuarios/registrarse.php");
        echo $viewer -> render("common/footer.php");
    }

    public function acceder() {
        
        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Acceso"]);
        echo $viewer -> render("Usuarios/acceso.php");
        echo $viewer -> render("common/footer.php");
    }

    public function pwd() {
        
        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Contraseña"]);
        echo $viewer -> render("Usuarios/pwd.php");
        echo $viewer -> render("common/footer.php");
    }
}