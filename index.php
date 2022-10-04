<?php

# First page
# Redirecting based on user session

session_start();

$_SESSION["servername"] = "localhost";
$_SESSION["sv_username"] = "root";
$_SESSION["sv_password"] = "";

if(!empty($_SESSION["user"]))
    $user = $_SESSION["user"];

if(!empty($gywa_user)){
    # redirecting to main page
    header("Location: src/pages/main.html");
    die();
}

else{
    # redirecting to login page
    header("Location: src/pages/login.html");
    die();
}

?>