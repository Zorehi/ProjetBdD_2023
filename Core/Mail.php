<?php
namespace App\Core;

use Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

require_once ROOT.'/Core/PHPMailer/src/Exception.php';
require_once ROOT.'/Core/PHPMailer/src/SMTP.php';
require_once ROOT.'/Core/PHPMailer/src/PHPMailer.php';

class Mail extends PHPMailer
{
    // Propriété de Mail
    private const HOST = "smtp-zorehi.alwaysdata.net";
    private const PORT = 587;
    private const USERNAME = "zorehi@alwaysdata.net";
    private const PASSWORD = "wushof-bagme9-minpIb";

    public function __construct() {
        parent::__construct(true);

        try {
            //Server settings
            $this->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $this->isSMTP();                                            //Send using SMTP
            $this->Host       = self::HOST;                     //Set the SMTP server to send through
            $this->Port       = self::PORT; 
            $this->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->Username   = self::USERNAME;                     //SMTP username
            $this->Password   = self::PASSWORD;                               //SMTP password
            $this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption


            $this->setFrom(self::USERNAME, 'Projet BdD');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->ErrorInfo}";
        }
    }

}

?>