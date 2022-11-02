<?php

# Login php POST

session_start();

include 'include\functions.php';

// if(!ConnectToDatabase()){
//     $msg = "Failed to connect to database!";
// }

// else{
//     $msg = MysqlLoginQuery();
// }

// echo str_replace('""', '', json_encode($msg));

$conn = new mysqli($_SESSION["SERVER_NAME"], $_SESSION["SERVER_USERNAME"], $_SESSION["SERVER_PASSWORD"]);
if($conn->connect_error){
    $msg = "Failed to connect to server!";
}
else{
    if(!empty($_POST)){
        $user = $_POST["login-user"];
        $password = md5($_POST["login-password"]);

        $mysql_command = "SELECT * FROM gywa.users WHERE username='$user' AND password='$password'";
        $res = $conn->query($mysql_command);

        if($res->num_rows){
            $_SESSION["APP_USERNAME"] = $user;
            $msg = "Login succesfull!";
        }
        else
            $msg = 'Login failed, wrong credentials!';
    }
    else{
        $msg = "Login failed with empty POST!";
    }
}

echo str_replace('""', '', json_encode($msg));

?>