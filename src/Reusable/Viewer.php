<?php

namespace Reusable;
class Viewer 
{

    public function render(string $template, array $usuarios)
    {
        require "views/$template";
    }
}