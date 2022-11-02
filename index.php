<?php

# First page
# Redirecting based on user session

session_start();

$_SESSION["SERVERNAME"] = "localhost";
$_SESSION["SV_USERNAME"] = "root";
$_SESSION["SV_PASSWORD"] = "";

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