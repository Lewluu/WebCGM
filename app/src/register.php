<?php

# Register php post

session_start();

include 'functions.php';

// sening registration mail

if(!empty($_POST)){
    $user_mail = $_POST["register-mail"];
    $user_password = $_POST["register-password"];
    $user_repassword = $_POST["register-repassword"];

    if(empty($user_mail))   $msg = 'Mail empty!';
    elseif(empty(wgm_check_domain($user_mail)))  $msg = 'Incorrect domain!';
    elseif($user_password != $user_repassword)  $msg = 'Password not the same!';
    elseif(empty($user_password))   $msg = 'Password empty!';
    else{
        // check database
        wgm_connect_to_database();
        $register_data = wgm_mysql_register_query();    // getting username and activation code

        if($register_data){
            $mailer = new WGM_Mailer();
            $mailer->CreateRegistrationMail($user_mail, $register_data[0], $register_data[1]);

            $msg = $mailer->SendMail();
        }
        else{
            $msg = "User already exists! Check mail for account activation!";
        }
    }
}

if(!empty($msg))    echo json_encode($msg);

?>