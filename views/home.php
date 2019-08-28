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


$page = 'Home';

if(isset($_SESSION['email'])) {

    $email = $_SESSION['email'];
    $user = user::details($email);
    
    $id = $user['id'];
    $image = $user['photo'];
    
    $user_id = $user['id'];
   
    
    require 'views/partials/header.php';
    require 'views/'.$view.'/'.$view.'.php';
    require 'views/partials/footer.php';
    
}else{
    require 'views/login/partials/header.php';
    require 'views/login/login.php';
    require 'views/login/partials/footer.php';
}