<?php

# First page
# Redirecting based on user session

session_start();

if(!empty($_SESSION["user"]))
    $user = $_SESSION["user"];

if(!empty($user)){
    # redirecting to main page
    echo "Redirecting to main page ... <br>";
}

else{
    # redirecting to login page
    header("Location: src/pages/login.html");
    die();
}

?>