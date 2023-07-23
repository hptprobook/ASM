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

$ship_name = $_GET['ship_name'];
$ship_address = $_GET['ship_address'];
$ship_email = trim($_GET['ship_email'], '"');
$ship_date = $_GET['ship_date'];

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
    $mail->addAddress($ship_email, $ship_name);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('hoaphan0420@gmail.com', 'Set Sail Travel');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Thanks for ordering!';
    $mail->Body    = 'Hello '.$ship_name.'. We have received your order placed on '.$ship_date.', sent to address '.$ship_address.'. Thank you for trusting us';
    $mail->AltBody = 'Hello '.$ship_name.'. We have received your order placed on '.$ship_date.', sent to address '.$ship_address.'. Thank you for trusting us';

    $mail->send();
    echo '<div class="alert alert-primary text-center">Order Success<br>Redirecting...</div>';
    header('Location: ?mod=user&act=order&is_checked_out=true');
} catch (Exception $e) {
    echo "<div class='alert alert-error text-center'>Order Failure. Mailer Error: {$mail->ErrorInfo}</div>";
}

?>

<? $template->getHeader(); ?>
<? $template->getFooter(); ?>

