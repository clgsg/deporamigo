<?php

namespace App\Models;

class Usuario {
    public function geActivityData(): array
    {
        # $dsn: The Data Source Name, or DSN, contains the information required to connect to the database
        $dsn = "mysql:host=localhost;dbname=thegame;charset=utf8;port=3306";

        # $dsn, $username and $password values + array of options
        $pdo = new PDO($dsn, "root", "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);


        # VALUES RETRIEVED FROM THE PDO QUERY are stored as a variable statement
        # $query: The SQL statement to prepare and execute. If the SQL contains placeholders, PDO::prepare() and PDOStatement::execute() must be used instead
        $stmt = $pdo->query("SELECT * FROM actividades");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }


}