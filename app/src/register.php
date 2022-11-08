<?php

# Register php post

session_start();

include 'Mailer/WGM_Mailer.php';
include 'functions.php';

// sening registration mail

if(!empty($_POST)){
    $user_mail = $_POST["register-mail"];
    $user_password = $_POST["register-password"];
    $user_repassword = $_POST["register-repassword"];

    if(empty($user_mail))   $err_msg = 'Mail empty!';
    elseif(empty(wgm_check_domain($mail)))  $err_msg = 'Incorrect domain!';
    elseif($user_password != $user_repassword)  $err_msg = 'Password not the same!';
    elseif(empty($user_password))   $err_msg = 'Password empty!';
    else{
        // check database
        wgm_connect_to_database();
        $register_data = wgm_mysql_register_query();    // getting username and activation code

        if($activation_code){
            $mail = new WGM_Mailer();
            $mail->CreateRegistrationMail($user_mail, $register_data[0], $register_data[1]);

            $mail->SendMail();
        }
        else{
            $err_msg = "User already exists! Check mail for account activation!";
        }
    }
}

if(!empty($err_msg))    echo json_encode($err_msg);

?>