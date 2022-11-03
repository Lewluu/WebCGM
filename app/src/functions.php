<?php

include 'Mailer/GWYA_Mailer.php';

global $conn;

function ConnectToDatabase(){
    global $conn;
    $conn = new mysqli($_SESSION["SERVER-NAME"], $_SESSION["SERVER-USERNAME"], $_SESSION["SERVER-PASSWORD"]);

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
            $_SESSION["APP-USERNAME"] = $user;

            return 'SUCCESS!';
        }
        else    return 'Login failed, wrong credentials!';

    }
    else    return 'Login failed, empty credential!';
}

function RegisterUser(){
    if(!empty($_POST)){
        $user_mail = $_POST["register-mail"];
        $user_password = $_POST["register-password"];
        $user_repassword = $_POST["register-repassword"];

        if($user_password != $user_repassword)  return 'Password not the same!';
        
        $mail = new GWYA_Mailer();
        $mail->CreateRegistrationMail($user_mail, "Test name");

        $mail->SendMail();
    }
}

?>