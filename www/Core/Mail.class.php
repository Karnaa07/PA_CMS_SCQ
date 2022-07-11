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
                $mail->Host       = 'smtp.hostinger.com';                       //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'contact@waterlilycms.fr';              //SMTP username
                $mail->Password   = 'Waterlily2022!';                        //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;             //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('contact@waterlilycms.fr', 'Reinitialisation de votre mot de passe');
                $mail->addAddress('syalicheff@myges.fr', 'Seb user');     //DESTINATAIRE

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Salut le boss';
                $mail->Body    = 
                '
                    <b> Mot de passe ou<blié ?/b> <br>
                    <a href="http://localhost/forget"> cliquez sur ce lien pour réinitialiser votre mot de passe </a>
                ';// href a
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                $mail->smtpClose();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error:";
            }
        }

        public function pwd_forget_mail(string $email, string $pwd) {
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            //To load the French version
            $mail->setLanguage('fr', '/optional/path/to/language/directory/');

            try { 
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.hostinger.com';                       //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'contact@waterlilycms.fr';              //SMTP username
                $mail->Password   = 'Waterlily2022!';                        //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;             //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('contact@waterlilycms.fr', 'Waterlily CORP');
                $mail->addAddress($email, '');     //DESTINATAIRE

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "Réinitialisation de votre mot de passe";
                $mail->Body    = 
                '
                    Vous avez entamé une procédure de réinitialisation de votre mot de passe
                    <b> Un mot de passe temporaire vous a été assigné : 
                    <br>
                        <h1 style="color:red;">'.$pwd.'</h1>
                    </b>
                    <a href="localhost/login"> Connectez vous avec votre nouveau mot de passe : </a>
                    <h2> Si vous n\'êtes pas à l\'origine de cette procédure : <a href="localhost/contact">Nous contacter</a></h2>
                ';// href a modifier lors du déploiement
                $mail->send();
                $mail->smtpClose();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error:";
            }
        }
        public function verif_account(string $email, string $name) {
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            //To load the French version
            $mail->setLanguage('fr', '/optional/path/to/language/directory/');

            try { 
                //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.hostinger.com';                       //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'contact@waterlilycms.fr';              //SMTP username
                $mail->Password   = 'Waterlily2022!';                        //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;             //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('contact@waterlilycms.fr', 'Waterlily CORP');
                $mail->addAddress($email, '');     //DESTINATAIRE

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "Validation";
                // AJOUTER UNE VARIABLE GLOBAL AVEC LE NOM DU SITE
                $mail->Body    = 
                '
                    // Bonjour'.$name.'tu as crée ton compte chez Nomdusite et nous t\'en remercions 
                    Plus qu\'un pas pour accèder a la formation de l\'année
                    il te suffit de cliquer sur le lien ci-dessous pour valider ton compte
                    <a href="localhost/confirmation">Je confirme mon compte</a></h2>
                    <h2> Si vous n\'êtes pas à l\'origine de cette procédure : <a href="localhost/contact">Nous contacter</a></h2>
                ';// href a modifier lors du déploiement
                $mail->send();
                $mail->smtpClose();
                // echo 'Message has been sent';
            } catch (Exception $e) {
                // echo "Message could not be sent. Mailer Error:";
            }
        }
}