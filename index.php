<?php

# First page
# Redirecting based on user session

session_start();

$_SESSION["SERVER_NAME"] = "localhost";
$_SESSION["SERVER_USERNAME"] = "root";
$_SESSION["SERVER_PASSWORD"] = "";
$_SESSION["APP_MAIL"] = "pia.generic@gmail.com";
$_SESSION["APP_PASSWORD"] = "ikyjkuvcnegndjzv";

if(!empty($_SESSION["USER"])){
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