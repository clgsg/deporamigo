<?php

namespace App\Controllers;

# 'use' indicates the correct namespace for Actividad, no need to prepend the whole route
use App\Models\Actividad;
use Common\Viewer;


class Actividades {
    public function verTodas(){
        $model = new Actividad;
        $actividades = $model->verTodas();

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


   #public function crear($apodo, $deporte, $fecha, $lugar, $min_jugadores=null, $max_jugadores=null, $comentarios){
   public function crear(){
        $model = new Actividad;
        #$actividades = $model->infoActividadPorID();
        
        $viewer = new Viewer;
        echo $viewer->render("common/header.php", ["title" => "DeporAmigo - Crear actividad"]);
        echo $viewer->render("Actividades/crear.php");
        #echo $viewer->render("Actividades/crear.php", ["actividades" => $actividades]);
        echo $viewer->render("common/footer.php");


       # COMPROBAR VALORES DE POST 
       # -----  eliminar ----
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            echo "<pre>";
            var_dump($_POST);
            echo "<pre>";
        } 
        /*
        $model = new Actividad;
        #$actividades = $model->crearActividad($apodo, $deporte, $fecha, $lugar, $min_jugadores, $max_jugadores, $comentarios);
        $actividades = $model->crear();
        
        $viewer = new Viewer;
        
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Actividades"]);
        echo $viewer -> render("Actividades/crear.php", ["actividades" => $actividades]);
        echo $viewer -> render("common/footer.php");
        */

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
        # Si se clica Eliminar actividad --> eliminar
        #$actividades = $model->eliminar($id_actividad);
        
        $viewer = new Viewer;
        
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Actividades"]);
        echo $viewer -> render("Actividades/editar.php");  #, ["actividades" => $actividades]);
        echo $viewer -> render("common/footer.php");

    }

    
}