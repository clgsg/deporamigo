<?php

namespace App\Controllers;

# 'use' indicates the correct namespace for Actividad, no need to prepend the whole route
use \App\Models\Actividad;
use Common\Viewer;


class Actividades {
    public function view(){
        $model = new Actividad;
        $actividades = $model->geActivityData();

        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Actividades"]);
        echo $viewer -> render("Actividades/view.php", ["actividades" => $actividades]);
        echo $viewer -> render("common/footer.php");

        
    }
    public function show(){
        $model = new Actividad;
        $actividades = $model->geActivityData();
        
        $viewer = new Viewer;
        
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Actividades"]);
        echo $viewer -> render("Actividades/show.php", ["actividades" => $actividades]);
        echo $viewer -> render("common/footer.php");


    }

}