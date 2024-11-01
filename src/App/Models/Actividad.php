<?php

namespace App\Models;

# Bring PDO object into namespace so we don't have to prefix it with path to root (backslash)
use PDO;
use App\Database;
use UnexpectedValueException;

class Actividad {
    public static function getInfoAllActivities()
    {
        $db = new Database($_ENV["DB_HOST"],$_ENV["DB_NAME"],$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);
        $pdo = $db->getDBConnection();

        # VALUES RETRIEVED FROM THE PDO QUERY are stored as a variable statement
        # $query: The SQL statement to prepare and execute. If the SQL contains placeholders, PDO::prepare() and PDOStatement::execute() must be used instead
        $stmt = $pdo->query("SELECT u.apodo, d.deporte, a.id_actividad , a.fecha, a.min_jugadores , a.max_jugadores , i.nombre_instalacion, a.comentarios 
        FROM actividades a
        join instalaciones i ON	a.fk_instalacion = i.id_instalacion
        join deportes d on a.fk_deporte = d.id_deporte 
        join usuarios u on u.id_usuario = a.fk_usuario;");

        if($stmt === null) {
            throw new UnexpectedValueException("No hemos encontrado ninguna actividad");
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

   public static function addActivity($apodo, $deporte, $fecha, $fk_instalacion, $min_jugadores=null, $max_jugadores=null)
   #public static function addActivity()
    {
        $db = new Database($_ENV["DB_HOST"],$_ENV["DB_NAME"],$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);
        $pdo = $db->getDBConnection();

        $stmt = $pdo->query("
                insert into actividades (fk_usuario, fk_deporte, fecha, fk_instalacion, min_jugadores, max_jugadores)
                values (
                    (select id_usuario from usuarios where apodo = :apodo), 
                    (select id_deporte from deportes where deporte = :deporte),
                    :fecha,
                    (select id_instalacion from instalaciones where fk_instalacion = :fk_instalacion),
                    :min_jugadores ,
                    :max_jugadores 
                );
            ");

        $stmt->bindValue(':apodo', $apodo, PDO::PARAM_STR);
        $stmt->bindValue(':deporte', $deporte, PDO::PARAM_STR);
        $stmt->bindValue(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindValue(':fk_instalacion', $fk_instalacion, PDO::PARAM_STR);
        $stmt->bindValue(':min_jugadores', $min_jugadores, PDO::PARAM_INT);
        $stmt->bindValue(':max_jugadores', $max_jugadores, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Actividad');
        $stmt->execute();
        

        if($stmt === null) {
            throw new UnexpectedValueException("No hemos encontrado ninguna actividad");
        }
        # return each row as an array indexed by column name as returned in the corresponding result set.
        return $stmt->fetchAll(PDO::FETCH_NAMED);

    }
    

    /*
    public static function addActivity()
    {
        $db = new Database($_ENV["DB_HOST"],$_ENV["DB_NAME"],$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);
        $pdo = $db->getDBConnection();

        # VALUES RETRIEVED FROM THE PDO QUERY are stored as a variable statement
        # $query: The SQL statement to prepare and execute. If the SQL contains placeholders, PDO::prepare() and PDOStatement::execute() must be used instead
        $stmt = $pdo->query("
                insert into actividades (fk_usuario, fk_deporte, fecha, fk_instalacion, min_jugadores, max_jugadores)
                values (1, 3, '2024-12-23', 2, 5, null
                );
            ");

     
        #$stmt->setFetchMode(PDO::FETCH_CLASS, 'Actividad');
        $stmt->execute();

        if($stmt === null) {
            throw new UnexpectedValueException("No hemos podido crear tu actividad.");
        }
        # return each row as an array indexed by column name as returned in the corresponding result set.
        return $stmt->fetchAll(PDO::FETCH_NAMED);

    }       */



    public static function editActivity(int $id){
        $db = new Database($_ENV["DB_HOST"],$_ENV["DB_NAME"],$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);
        $pdo = $db->getDBConnection();


        $info = $pdo->query("SELECT u.apodo, d.deporte, a.id_actividad , a.fecha, a.min_jugadores , a.max_jugadores , i.nombre_instalacion, a.comentarios 
        FROM actividades a
        join instalaciones i ON	a.fk_instalacion = i.id_instalacion
        join deportes d on a.fk_deporte = d.id_deporte 
        join usuarios u on u.id_usuario = a.fk_usuario
        where a.id_actividad = :id_actividad;");


        $stmt = $info->$pdo->query("
            update activity
            set 
            fecha = :fecha, 
            fk_instalacion = :id_instalacion,
            min_jugadores = :min_jugadores,
            max_jugadores = :max_jugadores
            where id_actividad = :id_actividad;
        ");
        
        $stmt->bindValue(':id_actividad', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Actividad');
        $stmt->execute();
        

        if($stmt === null) {
            throw new UnexpectedValueException("No hemos encontrado ninguna actividad");
        }
        # return each row as an array indexed by column name as returned in the corresponding result set.
        return $stmt->fetchAll(PDO::FETCH_NAMED);
    }
}