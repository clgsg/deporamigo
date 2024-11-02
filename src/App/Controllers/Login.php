<?php

namespace App\Controllers;

use App\Controllers\Authentication;
use App\Redirect;
use App\Models\Usuario;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = require 'includes/db.php';

    if (Usuario::authenticate($conn, $_POST['username'], $_POST['password'])) {
        
        Authentication::acceder();

        Redirect::redirect('/');

    } else {
        
        $error = "Error de inicio de sesión";

    }
}
?>