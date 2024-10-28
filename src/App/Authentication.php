<?php

namespace App;


class Authentication
{
    /* Return user authentication status (true/false) */
    public static function isLoggedIn():bool
    {
        return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'];
    }

    /* Prevent access and show message if user is not logged in*/
    public static function requireLogin() 
    {
        if(! static::isLoggedIn())  {
            die("Inicia sesión o regístrate como usuario.");
        }
    }

    /* Log in with session */
    public static function login()
    {
        session_regenerate_id(true);
        $_SESSION['is_logged_in'] = true;
    }

    /* Kill session to log out */
    public static function logout()
    {
        $_SESSION = [];
        if(ini_get("session.use_cookies"))
        {
            $params = session_get_cookie_params();
            setcookie(
                    session_name(), 
                    '', 
                    time() - 42000, 
                    $params["path"], 
                    $params["domain"], 
                    $params["secure"], 
                    $params["httponly"]
            );
        }
        session_destroy();
    }
}