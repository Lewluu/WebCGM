<?php

// check session status
if(session_status() == PHP_SESSION_NONE)    session_start();

class GYWA_User{
    // attributes
    private $username;
    private $mail_adress;

    // methods
    public function checkUser(){
        // not sure if necesary yet
        $this->username = $_SESSION["APP_USERNAME"];
        $this->mail_adress = $_SESSION["APP_USER_MAIL"];
    }
    public function getCredentials(){
        $credentials_array = [];

        $credentials_array[0] = $this->username;
        $credentials_array[1] = $this->password;
        $credentials_array[2] = $this->mail_adress;
    }
}

?>