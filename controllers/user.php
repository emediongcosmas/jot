<?php

class user {
    
    public static function register($firstname, $lastname, $email, $password) 
    {

        global $db;

        $param = array(
            'email'     => $email
        );
        
        $statement = "SELECT * FROM user WHERE email = :email";
        
        if ($db->row($statement, $param)) {
            respond::alert('danger', '', 'Email already registered');   
        } else {
            
            $param = array(
                'firstname' => request::secureTxt($firstname),
                'lastname'  => request::secureTxt($lastname),
                'email'     => $email,
                'password'  => request::securePwd($password),
                'timestamp' => date("Y-m-d H:i:s")    
            );
            
            $statement = "INSERT INTO user (firstname, lastname, email, password, timestamp) VALUE (:firstname, :lastname, :email, :password, :timestamp)";
        
            if ($db->query($statement, $param)) {
                respond::alert('success', '', 'Registration successful');
                
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                
                header('Location: home');   
            }else {
                respond::alert('danger', '', 'Registration unsuccessful');  
            }
        }
        
    }
    
    public static function login($email, $password) {

        global $db;

        $param = array(
            'email' => $email
        );

        $user = $db->query("SELECT * FROM user WHERE email = :email", $param, false);
        
        $registered_pwd = $user['password'];
        $pwd = crypt($password, $registered_pwd);
                
            if($registered_pwd != $pwd){
                respond::alert('danger', '', 'Invalid login details');
            } else {
                respond::alert('success', '', 'Login successful');
                
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                
                header('Location: home'); 
            }

    }
    
    public static function details($email){
        
        global $db;
        
        $param = array(
            'email' => $email
        );
        
        $user = $db->query("SELECT * FROM user WHERE email = :email", $param, false);
         
            if($user){
                return $user;
            }

    }
    
    public static function ProfilePicture($image) {
        
        if (empty($image)) { 
            $image = "profile-default.png"; 
            echo '<img class="img-profile rounded-circle" src="assets/img/'.$image.'">';
        } else {
            echo '<img class="img-profile rounded-circle" src="'.$image.'">';
        }
        
    }
    
}