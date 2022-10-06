<?php

namespace gywa;

session_start();

class User{
    // attributes
    private $username;
    private $password;
    private $email_adress;

    // methods
    public function checkUser(){
        // not sure if necesary yet
        $this->username = $_SESSION["app_username"];
        $this->password = $_SESSION["app_userpassword"];
        $this->email_adress = $_SESSION["app_useremailaddress"];
    }
    public function getCredentials(){
        $credentials_array = [];

        $credentials_array[0] = $this->username;
        $credentials_array[1] = $this->password;
        $credentials_array[2] = $this->email_adress;
    }
}

?>