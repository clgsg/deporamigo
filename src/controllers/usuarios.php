<?php

    # Create class Usuarios
    class Usuarios {

        public function view() {
            require "src/model/usuario.php";

            # We create an objet (instance) of class Model:
            $model = new Usuario;

            # We call the getData method on the object $model and assign its value to $usuarios
            $usuarios = $model-> getUserData();

            # We require the view here, once $usuarios has been defined. 
            # If put at the beginning, $usuarios from view will not be available.
            require "./view/usuarios_view.php";

        }

        public function show() {
            require "/view/usuarios_show.php";
        }
    }