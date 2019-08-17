<?php

if($routes[0] != ''){
    $views = array("login", "register");

    if(in_array($routes[0], $views)){

        $view = $routes[0];

    }else{

        $view = '404';

        }

}else{
    $view = "home";
}


$page = 'home';

if(isset($_SESSION['email'])) {

    $email = $_SESSION['email'];
    $user = user::details($email);
    $image = $user['photo'];
    
    require 'views/partials/header.php';
    require 'views/'.$view.'/'.$view.'.php';
    require 'views/partials/footer.php';
    
}else{
    require 'views/partials/header.php';
    require 'views/'.$view.'/'.$view.'.php';
    require 'views/partials/footer.php';
}