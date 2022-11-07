<?php

include 'Mailer/GWYA_Mailer.php';

global $conn;

function gywa_connect_to_database(){
    global $conn;
    $conn = new mysqli($_SESSION["SERVER_NAME"], $_SESSION["SERVER_USERNAME"], $_SESSION["SERVER_PASSWORD"]);

    if($conn->connect_error)    return 0;

    return 1;
}

function gywa_mysql_login_query(){
    global $conn;

    if(!empty($_POST)){
        $user = $_POST["login-user"];
        $password = md5($_POST["login-password"]);

        $sql_command = "SELECT active FROM gywa.users WHERE username='$user', password='$password'";
        $res = $conn->query($sql_command);

        if($res->num_rows){
            $row = $res->fetch_assoc();

            // check if user is activated
            if($row['active'] == 0) return 'User not activated!';

            $_SESSION["USER"] = $user;

            return 'SUCCESS!';
        }
        else    return 'Login failed, wrong credentials!';

    }
    else    return 'Login failed, empty credential!';
}

function gywa_check_domain($mail){

}

function gywa_mysql_register_query(){
    global $conn;

    if(!empty($_POST)){     
        $mail = $_POST["register-mail"];
        $password = $_POST["register-password"];

        $sql_command = "SELECT * FROM gywa.users WHERE email='$mail'";
        $res = $conn->query($sql_command);

        if(!$res->num_rows){
            $username = substr($mail, 0, strpos($mail, '@'));   // getting the username, without the address
            $password = md5($password);     // encrypting the password
            $activation_code = bin2hex(openssl_random_pseudo_bytes(16));    // generating activation code

            $sql_command = "INSERT INTO gwya.users(username, email, password, is_admin, active, activation_code) VALUES($username, $mail, $password, 0, 0, $activation_code)";
            $res = $conn->query($sql_command);

            if(!$res){
                die($conn->error);
            }

            return $activation_code;
        }
        else{
            // user already exists
            return 0;
        }
    }
}

function gywa_mysql_activate_user_query($mail_address){
    global $conn;

}

?>