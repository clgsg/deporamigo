<?php

namespace App;

use PDO;
class Database {

    public function __construct(private string $host, 
                                private string $name, 
                                private string $user, 
                                private string $password)
    {

    }
    public function getDBConnection(): PDO
    {
        # $dsn: The Data Source Name, or DSN, contains the information required to connect to the database
        $dsn = "mysql:host={$this->host};dbname={$this->name};charset=utf8;port=3306";

        # $dsn, $username and $password values + array of options
        return new PDO(dsn: $dsn, username: $this->user, password: $this->password, options: [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

    }
}