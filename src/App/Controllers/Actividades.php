<?php

namespace App\Controllers;

# 'use' indicates the correct namespace for Actividad, no need to prepend the whole route
use App\Models\Actividad;
use Common\Viewer;


class Actividades {
    public function view(){
        $model = new Actividad;
        $actividades = $model->getActivityData();

        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Actividades"]);
        echo $viewer -> render("Actividades/view.php", ["actividades" => $actividades]);
        echo $viewer -> render("common/footer.php");

        
    }
    public function show(){
        $model = new Actividad;
        $actividades = $model->getActivityData();
        
        $viewer = new Viewer;
        
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Actividades"]);
        echo $viewer -> render("Actividades/show.php", ["actividades" => $actividades]);
        echo $viewer -> render("common/footer.php");
    }


    public function add($apodo, $deporte, $fecha, $nombre_instalacion, $min_jugadores=null, $max_jugadores=null){
        $model = new Actividad;
        $actividades = $model->addActivity($apodo, $deporte, $fecha, $nombre_instalacion, $min_jugadores=null, $max_jugadores=null);
        
        $viewer = new Viewer;
        
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Actividades"]);
        echo $viewer -> render("Actividades/add.php", ["actividades" => $actividades]);
        echo $viewer -> render("common/footer.php");


    }

}