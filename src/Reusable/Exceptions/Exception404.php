<?php

namespace Reusable\Exceptions;
use DomainException;
use Reusable\Viewer;
class Exception404 extends DomainException
{
    public function showError(): void {
        $viewer = new Viewer;

        echo $viewer -> render("common/error.php", ["title" => "DeporAmigo - Error"]);
}
}