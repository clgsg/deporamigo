<?php

namespace App\Models;

# Bring PDO object into namespace so we don't have to prefix it with path to root (backslash)
use PDO;
use App\Database;
use UnexpectedValueException;


class Usuario {

    public $id_usuario;
    public $apodo;
    public $nombre;
    public $apellido1;
    public $apellido2;
    public $correo;
    public $password;
    

    public static function authenticate($apodo, $password) 
    {
        # Conectarse
        $db = new Database($_ENV["DB_HOST"],$_ENV["DB_NAME"],$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);
        $pdo = $db->getDBConnection();
        # Aplicar consulta a base de datos
        $sql="SELECT * FROM usuarios WHERE apodo= :apodo";
        $stmt = $pdo->query($sql);

        $stmt->bindValue(':apodo', $apodo, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
        $stmt->execute();

        if ($usuario = $stmt->fetch()){
            return password_verify($password, $usuario->password);
        }

    }

    public function getUserData(): array
    {
        $db = new Database($_ENV["DB_HOST"],$_ENV["DB_NAME"],$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);
        $pdo = $db->getDBConnection();
        # VALUES RETRIEVED FROM THE PDO QUERY are stored as a variable statement
        # $query: The SQL statement to prepare and execute. If the SQL contains placeholders, PDO::prepare() and PDOStatement::execute() must be used instead
        $stmt = $pdo->query("SELECT * FROM usuarios");

        if($stmt === null) {
            throw new UnexpectedValueException("No hemos encontrado ningún usuario");
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }

    public static function getUserById(int $id)
    {
        $db = new Database($_ENV["DB_HOST"],$_ENV["DB_NAME"],$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);
        $pdo = $db->getDBConnection();

        $stmt = $pdo->query("SELECT * FROM usuarios WHERE id_usuario = $id");

        if($stmt === null) {
            throw new UnexpectedValueException("No hemos encontrado ningún usuario con id $id");
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    #   public static function pwd($usuario, $apodo)
    public static function pwd(int $id_usuario, string $apodo)
    {
        $db = new Database($_ENV["DB_HOST"],$_ENV["DB_NAME"],$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);
        $pdo = $db->getDBConnection();
        $apodo="lugassi";
        $id_usuario=1;
        $correo = $pdo->query("select e.email 
        from emails e 
        join usuarios u on u.id_usuario = e.fk_usuario 
        where 
        u.apodo = $apodo and u.id_usuario = $id_usuario");

        /*
        $correo->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $correo->bindValue(':apodo', $apodo, PDO::PARAM_INT);
        */
        $correo->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
        $correo->execute();
        

        if($correo === null) {
            echo "Enlace enviado a tu correo electrónico";
        } else {
            echo "Enlace enviado a tu correo electrónico";
            return $correo->fetchColumn(PDO::FETCH_ASSOC);
        }
    }
}