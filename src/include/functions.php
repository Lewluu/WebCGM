<?php

session_start();

global $conn;

function ConnectToDatabase(){
    global $conn;
    $conn = new mysqli($_SESSION["SERVER_NAME"], $_SESSION["SERVER_USERNAME"], $_SESSION["SERVER_PASSWORD"]);

    if($conn->connect_error) return 0;

    return 1;
}

function MysqlLoginQuery(){
    global $conn;

    if(!empty($_POST)){
        $user = $_POST["login-user"];
        $password = md5($_POST["login-password"]);

        $mysql_command = "SELECT * FROM gywa.users WHERE username='$user' AND password='$password'";
        $res = $conn->query($mysql_command);

        if($res->num_rows){
            $_SESSION["APP_USERNAME"] = $user;

            return 'SUCCESS!';
        }
        else    return 'Login failed, wrong credentials!';

    }
    else    return 'Login failed, empty credential!';
}

?>