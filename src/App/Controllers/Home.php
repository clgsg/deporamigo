<?php

namespace App\Controllers;
use Common\Viewer;
class Home
{
    public function index()
    {
        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Inicio"]);
        echo $viewer -> render("Usuarios/login.php");
        echo $viewer -> render("common/footer.php");
    }
}