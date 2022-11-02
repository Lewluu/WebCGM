<?php

// check session status
if(session_status() == PHP_SESSION_NONE)    session_start();

include 'include\Mailer.php';

$mailer = new GWYA_Mailer;
$user = new GYWA_User;

?>