<?php

session_start();

include 'functions.php';

if(!empty($_GET["activation_code"])){
    $activation_code = $_GET["activation_code"];

    if(!wgm_connect_to_database())  die();

    print(wgm_mysql_activate_user_query($activation_code));
}
else{
    print("Activation code doesn't exists ...");
    die();
}

?>