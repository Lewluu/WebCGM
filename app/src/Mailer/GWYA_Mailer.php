<?php

// check session status
if(session_status() == PHP_SESSION_NONE)    session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

include '../../vendor/phpmailer/phpmailer/src/Exception.php';
include '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
include '../../vendor/phpmailer/phpmailer/src/SMTP.php';
include '../../vendor/autoload.php';

class GWYA_Mailer{
    // attributes
    private $mail;

    // methods
    public function __construct()
    {
        $this->mail = new PHPMailer();
    }
    public function CreateNormalMail($receiver, $name, $content, $subject){
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $this->mail->isSMTP();
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->SMTPAuth = true;

        // set admin credentials
        $this->mail->Username = $_SESSION["ADMIN_MAIL"];
        $this->mail->Password = $_SESSION["ADMIN_PASSWORD"];
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->Port = 465;

        // recipients
        $this->mail->setFrom($_SESSION["APP_USER_MAIL"]);
        for($i=0;$i<sizeof($receiver);$i++){
            $this->mail->addAddress($receiver[$i], $name[$i]);
        }

        // content
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $content;

    }
    public function CreateRegistrationMail($receiver, $name){
        // configure
        $this->mail->isSMTP(true);
        $this->mail->Mailer = "smtp";
        $this->mail->SMTPDebug = 1;
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;
        $this->mail->Host = "smtp.gmail.com";

        // set admin credentials
        $this->mail->Username = $_SESSION["APP_MAIL"];
        $this->mail->Password = $_SESSION["APP_PASSWORD"];
        
        // recipients
        $this->mail->addAddress($receiver, $name);

        // content
        $this->mail->isHTML(true);
        $this->mail->Subject = "Registration mail for GYWA";
        $this->mail->Body = "Please check the link to verify your account: <a href='http://localhost/gywa/src/verify.php'> Verify! </a>";

    }
    public function SendMail(){
        $message = "";
        try{
            $this->mail->send();
            
            $message = "Mail send successfuly!";
        }
        catch(Exception $e){
            $message = $this->mail->ErrorInfo;
        }

        return $message;
    }
}

?>