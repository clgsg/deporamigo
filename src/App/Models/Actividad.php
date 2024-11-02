<?php

namespace App\Models;

# Bring PDO object into namespace so we don't have to prefix it with path to root (backslash)
use PDO;
use App\Database;
use UnexpectedValueException;

class Actividad {
    public $id_actividad;
    public $deporte;
    public $fecha;
    public $lugar;
    public $min_jugadores;
    public $max_jugadores;
    public $comentarios;

    public  function getInfoAllActivities()
    {
        $db = new Database($_ENV["DB_HOST"],$_ENV["DB_NAME"],$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);
        $pdo = $db->getDBConnection();
        
        $query="
            SELECT u.apodo, d.deporte, a.id_actividad , a.fecha, a.min_jugadores , a.max_jugadores , i.nombre_instalacion as lugar, a.comentarios 
            FROM actividades a
            join instalaciones i ON	a.fk_instalacion = i.id_instalacion
            join deportes d on a.fk_deporte = d.id_deporte 
            join usuarios u on u.id_usuario = a.fk_usuario;
        ";

        $stmt = $pdo->prepare($query);
        $stmt -> execute();

        if($stmt === null) {
            echo "No hemos encontrado ninguna actividad";
        } else {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }



    public  function infoActividadPorID(int $id_actividad)
    {
        $db = new Database($_ENV["DB_HOST"],$_ENV["DB_NAME"],$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);
        $pdo = $db->getDBConnection();
        
        $id_actividad=3;

        $query="
            SELECT u.apodo, d.deporte, a.id_actividad , a.fecha, a.min_jugadores , a.max_jugadores , i.nombre_instalacion as lugar, a.comentarios 
            FROM actividades a
            join instalaciones i ON	a.fk_instalacion = i.id_instalacion
            join deportes d on a.fk_deporte = d.id_deporte 
            join usuarios u on u.id_usuario = a.fk_usuario
            where a.id_actividad = $id_actividad;
        ";

        $stmt = $pdo->prepare($query);
        $stmt -> execute();

        if($stmt === null) {
            echo "No hemos encontrado ninguna actividad";
        } else {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }



   #public  function nuevaActividad(string $apodo, string $deporte, string $fecha, string $lugar, int $min_jugadores=null, int $max_jugadores=null, string $comentarios)
   public function nuevaActividad()
    {
        /*
        $apodo = $this->$apodo;
        $deporte = $this->$deporte;
        $fecha = $this->$fecha;
        $lugar = $this->$lugar;
        $min_jugadores = $this->$min_jugadores;
        $max_jugadores = $this->$max_jugadores;
        $comentarios = $this->$comentarios;
        */
      

        $db = new Database($_ENV["DB_HOST"],$_ENV["DB_NAME"],$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);
        $pdo = $db->getDBConnection();


 # COMPROBAR SI SE LLAMA ESTA FUNCIÓN AÑADIENDO ACTIVIDAD "EN BRUTO"   
    $query="
        insert into actividades (fk_usuario, fk_deporte, fecha, fk_instalacion, min_jugadores, max_jugadores, comentarios)
        values (1, 3, '2024-12-23', 6, 2, 5, 'Comentario de prueba'); 
    ";

    /*
        $query = "insert into actividades (fk_usuario, fk_deporte, fecha, fk_instalacion, min_jugadores, max_jugadores)
            values (
                (select id_usuario from usuarios where apodo = :apodo), 
                (select id_deporte from deportes where deporte = :deporte),
                :fecha,
                (select id_instalacion from instalaciones where nombre_instalacion = :lugar),
                :min_jugadores ,
                :max_jugadores 
            );
        ";

        $stmt = $pdo->prepare($query);

        $stmt->bindValue(':apodo', $apodo, PDO::PARAM_STR);
        $stmt->bindValue(':deporte', $deporte, PDO::PARAM_STR);
        $stmt->bindValue(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindValue(':lugar', $lugar, PDO::PARAM_STR);
        $stmt->bindValue(':min_jugadores', $min_jugadores, PDO::PARAM_INT);
        $stmt->bindValue(':max_jugadores', $max_jugadores, PDO::PARAM_INT);
        */

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        

        if($stmt === null) {
            echo "No hemos encontrado ninguna actividad";
        } else {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
    

    public  function editarActividad(int $id_actividad){

        $db = new Database($_ENV["DB_HOST"],$_ENV["DB_NAME"],$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);
        $pdo = $db->getDBConnection();


                                        /*
                                        $infoActividad= "SELECT u.apodo, d.deporte, a.id_actividad , a.fecha, a.min_jugadores , a.max_jugadores , i.nombre_instalacion, a.comentarios 
                                        FROM actividades a
                                        join instalaciones i ON	a.fk_instalacion = i.id_instalacion
                                        join deportes d on a.fk_deporte = d.id_deporte 
                                        join usuarios u on u.id_usuario = a.fk_usuario
                                        where a.id_actividad = :id_actividad;";
                                        */
                                        /*  COMPROBAR SI SE LLAMA ESTA FUNCIÓN MODIFICANDO ACTIVIDAD "EN BRUTO"   
                                                $stmt = $info->$pdo->query("update activity
                                                                            set 
                                                                                fecha = '1999-03-20'
                                                                                fk_instalacion = 6,
                                                                                min_jugadores = 20,
                                                                                max_jugadores = 21
                                                                            where id_actividad = 5;
                                                ");
                                                */
        $query="
                update activity
                set 
                    fecha = :fecha, 
                    fk_instalacion = :id_instalacion,
                    min_jugadores = :min_jugadores,
                    max_jugadores = :max_jugadores
                where id_actividad = :id_actividad;    
        ";


        $stmt = $pdo->prepare($query);
        
        $stmt->bindValue(':id_actividad', $id_actividad, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC, 'Actividad');
        $stmt->execute();
        

        if($stmt === null) {
            throw new UnexpectedValueException("No hemos encontrado ninguna actividad");
        }
        # return each row as an array indexed by column name as returned in the corresponding result set.
        return $stmt->fetchAll(PDO::FETCH_NAMED);
    }

    /** Elimina la actividad cuyo id se haya pasado como parámetro
     * @param id_actividad
    */
    public  function eliminarActividad(int $id_actividad){
        $db = new Database($_ENV["DB_HOST"],$_ENV["DB_NAME"],$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);
        $pdo = $db->getDBConnection();

        $stmt = $pdo->query("delete from actividades where id_actividad = :id_actividad;");
        
        $stmt->bindValue(':id_actividad', $id_actividad, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC, 'Actividad');
        $stmt->execute();
        

        if($stmt === null) {
            throw new UnexpectedValueException("No hemos encontrado ninguna actividad");
        }
        echo "Hemos eliminado la actividad";
    }
}