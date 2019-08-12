<?php



if(isset($_SESSION['email'])) {

    $email = $_SESSION['email'];
    // $user = users::details($email);
    
    require 'views/partials/header.php';
    require 'views/'.$view.'/'.$view.'.php';
    require 'views/partials/footer.php';
    
}else{
    require 'views/partials/header.php';
    require 'views/'.$view.'/'.$view.'.php';
    require 'views/partials/footer.php';
}