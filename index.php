<?php

# First page
# Redirecting based on user session

session_start();

$user = $_SESSION["user"];

if(!empty($user)){
    # redirecting to main page
}

else{
    # redirecting to login page
}

?>