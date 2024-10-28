<?php

namespace App\Models;

# Bring PDO object into namespace so we don't have to prefix it with path to root (backslash)
use PDO;
use App\Database;
use UnexpectedValueException;
class Usuario {
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
}