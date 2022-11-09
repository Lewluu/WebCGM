<?php

// check session status
if(session_status() == PHP_SESSION_NONE)    session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// require '../../vendor/phpmailer/phpmailer/src/Exception.php';
// require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../../vendor/autoload.php';

class WGM_Mailer{
    // attributes
    private $mail;
    private $content;

    // methods
    public function __construct()
    {
        $this->mail = new PHPMailer();
    }
    public function CreateNormalMail($receiver, $name, $content, $subject){
        $this->mail->SMTPDebug = 2;
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
    public function CreateRegistrationMail($receiver, $name, $activation_code){
        // configure
        $this->mail->isSMTP(true);
        $this->mail->Mailer = "smtp";
        // $this->mail->SMTPDebug = SMTP::DEBUG_LOWLEVEL;
        $this->mail->SMTPDebug = 0;
        $this->mail->SMTPAuth = TRUE;
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Port = 465;
        $this->mail->Host = "smtp.gmail.com";

        // set admin credentials
        $this->mail->Username = $_SESSION["APP_MAIL"];
        $this->mail->Password = $_SESSION["APP_PASSWORD"];
        
        // recipients
        $this->mail->addAddress($receiver, $name);
        $this->mail->setFrom($_SESSION["APP_MAIL"]);

        // content
        $this->mail->isHTML(true);
        $this->mail->Subject = "Registration mail for GYWA";
        $this->content = "Please check the link to verify your account: <a href='http://localhost/websitegm/app/src/verify.php?activation_code=$activation_code'> Verify! </a>";
    }
    public function SendMail(){
        $msg = "";
        $this->mail->msgHTML($this->content);
        if(!$this->mail->send()){
            $msg = $this->mail->ErrorInfo;
        }
        else{
            $msg = "Mail sent successfuly!";
        }

        return $msg;
    }
}

?>