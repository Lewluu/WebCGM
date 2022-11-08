<?php

session_start();

include 'functions.php';

$mail = $_GET['mail'];

wgm_check_domain($mail);

?>