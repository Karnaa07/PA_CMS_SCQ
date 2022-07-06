<?php
//c
namespace App\Core;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
class Mail {
        public $mail;
        public function send_mail() {
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            //To load the French version
            $mail->setLanguage('fr', '/optional/path/to/language/directory/');

            try { 
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'waterlily.scc@gmail.com';              //SMTP username
                $mail->Password   = 'Waterlily2022';                        //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;             //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('waterlily.scc@gmail.com', 'Clem admin');
                $mail->addAddress('syalicheff@myges.fr', 'Seb user');     //DESTINATAIRE
                //$mail->addAddress('ellen@example.com');               //Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Salut le boss';
                $mail->Body    = 'WATERLILYYYYYYYYYYY!</b>';
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                $mail->smtpClose();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error:";
            }
        }
}