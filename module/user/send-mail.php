<?php


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'libs/PHPMailer/src/Exception.php';
require 'libs/PHPMailer/src/SMTP.php';
require 'libs/PHPMailer/src/PHPMailer.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$username = $_GET['username'];
$email = $_GET['email'];

try {
  //Server settings
  $mail->SMTPDebug = 0;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'hoaphan0420@gmail.com';                     //SMTP username
  $mail->Password   = 'temhbmuhairdsfud';                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('hoaphan0420@gmail.com', 'Set Sail Travel');
  $mail->addAddress($email, $username);     //Add a recipient
  // $mail->addAddress('ellen@example.com');               //Name is optional
  $mail->addReplyTo('hoaphan0420@gmail.com', 'Set Sail Travel');
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');

  //Attachments
  // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Register Successfully!';
  $mail->Body    = 'Hello ' . $username . '. You have successfully registered an account ' . $username . ' at Set Sail Travel';
  $mail->AltBody = '';

  $mail->send();
} catch (Exception $e) {
}

?>

<? $template->getHeader(); ?>
<? $template->getFooter(); ?>

