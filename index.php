<?php

# First page
# Redirecting based on user session

session_start();

$_SESSION["SERVER_NAME"] = "localhost";
$_SESSION["SERVER_USERNAME"] = "root";
$_SESSION["SERVER_PASSWORD"] = "";
$_SESSION["APP_MAIL"] = "pia.generic@gmail.com";
$SESSION["APP_PASSWORD"] = "ipageneric15";

if(!empty($_SESSION["USER"]))
    $user = $_SESSION["USER"];

if(!empty($user)){
    # redirecting to main page
    header("Location: src/pages/main.html");
    die();
}

else{
    # redirecting to login page
    header("Location: utils/pages/login.html");
    die();
}

?>