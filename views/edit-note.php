<?php

$page = 'Edit';

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