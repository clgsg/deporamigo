<?php

namespace Common;
class Viewer 
{
    # By assigning a default value of empty array to $data, we make it optional
    public function render(string $template, array $data=[]): string
    {
        # EXTR_SKIP avoids overriting variables if they already exist
        extract($data, EXTR_SKIP);
        
        # Turn output buffering (OB) on
        ob_start();

        # 'require' only allows display as webpage
        require "views/$template";

        # Return the value of 'get contents and close the output buffer'
        return ob_get_clean();

        # 'file_get_contents' gets the content WITHOUT executing it --> no rendering on browser
        # return file_get_contents("views/$template");

    }
}