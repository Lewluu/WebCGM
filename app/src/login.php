<?php

# Login php POST

session_start();

include 'functions.php';

if(!gywa_connect_to_database()){
    $msg = 'Failed to connect to database!';
}

else{
    $msg = gywa_mysql_login_query();
}

echo json_encode($msg);

?>