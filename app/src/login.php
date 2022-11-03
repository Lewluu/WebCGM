<?php

# Login php POST

session_start();

include 'functions.php';

if(!ConnectToDatabase()){
    $msg = 'Failed to connect to database!';
}

else{
    $msg = MysqlLoginQuery();
}

echo json_encode($msg);

?>