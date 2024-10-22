<?php

namespace App\Controllers;
use Reusable\Viewer;
class Home
{
    public function index()
    {
        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Home"]);
        echo $viewer-> render("Home/index.php");
    }

}