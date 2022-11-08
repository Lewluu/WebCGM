<?php

# Login php POST

session_start();

include 'functions.php';

if(!wgm_connect_to_database()){
    $msg = 'Failed to connect to database!';
}

else{
    $msg = wgm_mysql_login_query();
    if($msg == 'SUCCESS!'){
        header("Location: ../pages/main.html");
        die();
    }
}

echo json_encode($msg);

?>