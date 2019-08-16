<?php

class respond {
    
    public static function active($page, string $target)
    {
        if($page == $target)
        {
            echo 'active';
        }
    }
    
}