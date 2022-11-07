<?php

# Register php post

session_start();

include 'Mailer/GWYA_Mailer.php';

// sening registration mail

if(!empty($_POST)){
    $user_mail = $_POST["register-mail"];
    $user_password = $_POST["register-password"];
    $user_repassword = $_POST["register-repassword"];

    if(empty($user_mail))   $msg = 'Mail empty!';
    elseif($user_password != $user_repassword)  $msg = 'Password not the same!';
    elseif(empty($user_password))   $msg = 'Password empty!';
    else{
        $mail = new GWYA_Mailer();
        $mail->CreateRegistrationMail($user_mail, "Test name");

        $mail->SendMail();
    }
}

if(!empty($msg))    echo json_encode($msg);

?>