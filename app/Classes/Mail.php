<?php

namespace App\Classes;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require '../../vendor/phpmailer/phpmailer/src/Exception.php';
// require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

//Load Composer's autoloader
// require '../../vendor/autoload.php';

class Mail {

    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        //Server settings
        // $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;             //Enable verbose debug output
        $this->mail->isSMTP();                                      //Send using SMTP
        $this->mail->Host       = 'smtp-mail.outlook.com';          //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                             //Enable SMTP authentication
        $this->mail->Username   = '#####@#####.#####';              //SMTP username
        $this->mail->Password   = '#####';                          //SMTP password
        // $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   //Enable implicit TLS encryption
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $this->mail->Port       = 587;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Sender
        $this->mail->setFrom('#####@#####.#####', 'Support informatique GSB');
    }

    public function sendMail($to, $subject, $message)
    {
        try
        {

            //Recipients
            $this->mail->addAddress($to);                                   //Add a recipient
            // $this->mail->addAddress('ellen@example.com');                //Name is optional
            // $this->mail->addReplyTo('info@example.com', 'Information');
            // $this->mail->addCC('cc@example.com');
            // $this->mail->addBCC('bcc@example.com');

            //Attachments
            // $this->mail->addAttachment('/var/tmp/file.tar.gz');          //Add attachments
            // $this->mail->addAttachment('/tmp/image.jpg', 'new.jpg');     //Optional name

            // Content
            $this->mail->isHTML(true);                                      //Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body    = $message;
            $this->mail->AltBody = $message;

            $this->mail->send();
            // echo 'Message has been sent';
            return $this->mail;
        }

        catch (Exception $e)
        {
            echo "Message could not be sent. Mailer Error: " . $this->mail->ErrorInfo;
        }
    }

}