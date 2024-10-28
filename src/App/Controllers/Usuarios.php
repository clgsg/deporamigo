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

    public function show(string $id) {
        
        $model = new Usuario;
        # We call the findUsrById method on the object $model and assign its value to $usuario
        $usuario = $this->$model->findUsrById($id);

        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Usuarios"]);
        # We use view Usuarios to return all data from $usuario
        echo $this->$viewer->render("Usuarios/show.php", ["id_usuario" => $usuario]);
    }
}