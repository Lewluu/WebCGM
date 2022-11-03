<?php

# First page
# Redirecting based on user session

session_start();

$_SESSION["SERVER-NAME"] = "localhost";
$_SESSION["SERVER-USERNAME"] = "root";
$_SESSION["SERVER-PASSWORD"] = "";
$_SESSION["APP-MAIL"] = "pia.generic@gmail.com";
$_SESSION["APP-PASSWORD"] = "ipageneric15";

if(!empty($_SESSION["USER"]))
    $user = $_SESSION["USER"];

if(!empty($user)){
    # redirecting to main page
    header("Location: app/pages/main.html");
    die();
}

else{
    # redirecting to login page
    header("Location: app/pages/login.html");
    die();
}

?>