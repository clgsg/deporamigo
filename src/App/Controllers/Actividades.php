<?php

namespace App\Controllers;

# 'use' indicates the correct namespace for Actividad, no need to prepend the whole route
use App\Models\Actividad;
use Common\Viewer;


class Actividades {
    public function ver(){
        $model = new Actividad;
        $actividades = $model->getInfoAllActivities();

        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Actividades"]);
        echo $viewer -> render("Actividades/ver.php", ["actividades" => $actividades]);
        echo $viewer -> render("common/footer.php");

        
    }
    public function mostrar(string $id){
        $model = new Actividad;
        $actividades = $model->infoActividadPorID($id);
        
        $viewer = new Viewer;
        
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Actividades"]);
        echo $viewer -> render("Actividades/mostrar.php", ["actividades" => $actividades]);
        echo $viewer -> render("common/footer.php");
    }


   #public function nuevaActividad($apodo, $deporte, $fecha, $lugar, $min_jugadores=null, $max_jugadores=null, $comentarios){
   public function nueva(){
       
        /*
        $apodo=$_POST["apodo"];
        $deporte=$_POST["deporte"];
        $fecha=$_POST["fecha"];
        $lugar=$_POST["lugar"];
        $min_jugadores=$_POST["min_jugadores"];
        $max_jugadores=$_POST["max_jugadores"];
        $comentarios=$_POST["comentarios"];
        */

       # COMPROBAR VALORES DE POST 
       # -----  eliminar ----
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            echo "<pre>";
            var_dump($_POST);
            echo "<pre>";
        } 
        #-----------------------
    
        $model = new Actividad;
        #$actividades = $model->nuevaActividad($apodo, $deporte, $fecha, $lugar, $min_jugadores, $max_jugadores, $comentarios);
        $actividades = $model->nueva();
        
        $viewer = new Viewer;
        
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Actividades"]);
        echo $viewer -> render("Actividades/nueva.php", ["actividades" => $actividades]);
        echo $viewer -> render("common/footer.php");


    }   

    public function editar(){
    /*public function editar($id_actividad, $apodo, $fecha, $min_jugadores , $max_jugadores , $id_instalacion, $comentarios){
        $id_actividad=$_POST["id_actividad"];
        $apodo=$_POST["apodo"];
        $fecha=$_POST["fecha"];
        $id_instalacion=$_POST["id_instalacion"];
        $min_jugadores=$_POST["$min_jugadores"];
        $max_jugadores=$_POST["$max_jugadores"];
        $comentarios=$_POST["$comentarios"];
        */
        # COMPROBAR VALORES DE POST   # -----  eliminar -----------------#
       if ($_SERVER['REQUEST_METHOD']=='POST'){
            echo "<pre>";
            var_dump($_POST);
            echo "<pre>";
    } 
    #-----------------------

        $model = new Actividad;

        # Si se clica Guardar cambios --> editar
        #$actividades = $model->editarActividad($id_actividad, $apodo, $fecha, $id_instalacion, $min_jugadores, $max_jugadores, $comentarios);
        # Si se clica Eliminar actividad --> eliminarActividad
        #$actividades = $model->eliminarActividad($id_actividad);
        
        $viewer = new Viewer;
        
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Actividades"]);
        echo $viewer -> render("Actividades/editar.php");  #, ["actividades" => $actividades]);
        echo $viewer -> render("common/footer.php");

    }

    
}