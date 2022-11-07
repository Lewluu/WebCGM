<?php

# Register php post

session_start();

include 'Mailer/GYWA_Mailer.php';
include 'functions.php';

// sening registration mail

if(!empty($_POST)){
    $user_mail = $_POST["register-mail"];
    $user_password = $_POST["register-password"];
    $user_repassword = $_POST["register-repassword"];

    if(empty($user_mail))   $err_msg = 'Mail empty!';
    elseif($user_password != $user_repassword)  $err_msg = 'Password not the same!';
    elseif(empty($user_password))   $err_msg = 'Password empty!';
    else{
        // check database
        gywa_connect_to_database();
        $activation_code = gywa_mysql_register_query();

        if($activation_code){
            $mail = new GYWA_Mailer();
            $mail->CreateRegistrationMail($user_mail, "Test name", $activation_code);

            $mail->SendMail();
        }
        else{
            $err_msg = "User already exists! Check mail for account activation!";
        }
    }
}

if(!empty($err_msg))    echo json_encode($err_msg);

?>