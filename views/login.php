<?php

if($routes[0] != ''){
    $views = array("login", "register");

    if(in_array($routes[0], $views)){

        $view = $routes[0];

    }else{

        $view = '404';

        }

}else{
    $view = "login";
}


    $page = 'login';

    require 'views/'.$view.'/partials/header.php';
    require 'views/'.$view.'/'.$view.'.php';
    require 'views/partials/footer.php';