<?php

namespace App\Controllers;

# 'use' indicates the correct namespace for Actividad, no need to prepend the whole route
use App\Models\Actividad;
use Common\Viewer;


class Actividades {
    public function view(){
        $model = new Actividad;
        $actividades = $model->getInfoAllActivities();

        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Actividades"]);
        echo $viewer -> render("Actividades/view.php", ["actividades" => $actividades]);
        echo $viewer -> render("common/footer.php");

        
    }
    public function show(){
        $model = new Actividad;
        $actividades = $model->getInfoAllActivities();
        
        $viewer = new Viewer;
        
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Actividades"]);
        echo $viewer -> render("Actividades/show.php", ["actividades" => $actividades]);
        echo $viewer -> render("common/footer.php");
    }


   public function add($apodo, $deporte, $fecha, $nombre_instalacion, $min_jugadores=null, $max_jugadores=null){
   #public function add(){
        $apodo=$_POST["apodo"];
        $deporte=$_POST["deporte"];
        $fecha=$_POST["fecha"];
        $nombre_instalacion=$_POST["nombre_instalacion"];
        $min_jugadores=$_POST["$min_jugadores"];
        $max_jugadores=$_POST["$max_jugadores"];

       # COMPROBAR VALORES DE POST 
       # -----  eliminar ----
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            var_dump($_POST);
        } 
        #-----------------------
    
        $model = new Actividad;
        $actividades = $model->addActivity($apodo, $deporte, $fecha, $nombre_instalacion, $min_jugadores, $max_jugadores);
        
        $viewer = new Viewer;
        
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Actividades"]);
        echo $viewer -> render("Actividades/add.php", ["actividades" => $actividades]);
        echo $viewer -> render("common/footer.php");


    }   

    public function editActivity(){
    /*public function editActivity($id_actividad, $apodo, $fecha, $min_jugadores , $max_jugadores , $id_instalacion, $comentarios){
        $id_actividad=$_POST["id_actividad"];
        $apodo=$_POST["apodo"];
        $fecha=$_POST["fecha"];
        $id_instalacion=$_POST["id_instalacion"];
        $min_jugadores=$_POST["$min_jugadores"];
        $max_jugadores=$_POST["$max_jugadores"];
        $comentarios=$_POST["$comentarios"];
        */
        # COMPROBAR VALORES DE POST 
       # -----  eliminar ----
       if ($_SERVER['REQUEST_METHOD']=='POST'){
        var_dump($_POST);
    } 
    #-----------------------

        $model = new Actividad;
        #$actividades = $model->editActivity($id_actividad, $apodo, $fecha, $id_instalacion, $min_jugadores, $max_jugadores, $comentarios);
        
        $viewer = new Viewer;
        
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Actividades"]);
        echo $viewer -> render("Actividades/edit.php");  #, ["actividades" => $actividades]);
        echo $viewer -> render("common/footer.php");

    }
}