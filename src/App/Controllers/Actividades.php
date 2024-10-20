<?php

namespace App\Controllers;

# 'use' indicates the correct namespace for Actividad, no need to prepend the whole route
use \App\Models\Actividad;


class Actividades {
    public function view(){
        $model = new Actividad;
        $actividad = $model->geActivityData();
        require "views/actividades_view.php";
        
    }
    public function show(){
        $model = new Actividad;
        $actividad = $model->geActivityData();
        require "views/actividades_show.php";

    }

}