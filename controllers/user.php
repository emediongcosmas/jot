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
    
}