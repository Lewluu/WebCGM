<?php

session_start();

include 'functions.php';

$msg = RegisterUser();

echo json_encode($msg);

?>