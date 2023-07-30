<?
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require '../../libs/DBDriver.php';
require '../../libs/Validate.php';
$database = new DB_Driver();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../libs/PHPMailer/src/Exception.php';
require '../../libs/PHPMailer/src/SMTP.php';
require '../../libs/PHPMailer/src/PHPMailer.php';
$user_info = $database->get_row('SELECT * FROM users WHERE email = "' . $_POST['lost-password__email'] . '"') ? $database->get_row('SELECT * FROM users WHERE email = "' . $_POST['lost-password__email'] . '"') : NULL;
$email = $_POST['lost-password__email'];
$error = array();

if (empty($email)) $error['empty'] = 'Email is not be empty!';
else {
  if (!is_email($email)) $error['valid'] = 'Email address does not exist!';
  else {
    if (empty($user_info)) $error['email'] = 'Email address already exists!';
  }
}

if (empty($error)) {
  $verifyCode = generateVerificationCode();


  // Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

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
    $mail->addAddress($email, $email);     //Add a recipient
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
    $mail->Body    = 'Your verification code is: <br> <h1>' . $verifyCode . '</h1> <br> Thank you!';
    $mail->AltBody = '';

    $mail->send();
  } catch (Exception $e) {
    $error['mail'] = $e->getMessage();
  }
  echo json_encode($verifyCode);
} else echo json_encode($error);


