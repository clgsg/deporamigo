<?php

namespace App\Controllers;
use Common\Viewer;
class Home
{
    public function index()
    {
        $viewer = new Viewer;
        echo $viewer -> render("common/header.php", ["title" => "DeporAmigo - Home"]);
        echo $viewer -> render("common/footer.php");
    }
}