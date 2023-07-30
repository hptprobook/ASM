<?

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require '../../libs/DBDriver.php';
require '../../libs/Validate.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../libs/PHPMailer/src/Exception.php';
require '../../libs/PHPMailer/src/SMTP.php';
require '../../libs/PHPMailer/src/PHPMailer.php';

$database = new DB_Driver();
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$repass = $_POST['repass'];
$error = array();

// Validate Username
if (empty($username)) $error['username'] = 'Username can not be empty!';
else {
  if (!is_username($username)) $error['username'] = 'Username can only contain letters, numbers, 3-20 characters, and no special characters';
  else {
    $username_in_db = $database->get_row('SELECT * FROM users WHERE username = "' . $username . '"');
    if (!empty($username_in_db)) $error['username'] = 'Username already exists. Please try a different username!';
  }
}

// Validate Email
if (empty($email)) $error['email'] = 'Email can not be empty!';
else {
  if (!is_email($email)) $error['email'] = 'Email address does not exist!';
  else {
    $email_in_db = $database->get_row('SELECT * FROM users WHERE email = "' . $email . '"');
    if (!empty($email_in_db)) $error['email'] = 'Email already exists. Please try a different Email!';
  }
}



// Validate Pasword
if (empty($password)) $error['password'] = 'Password can not be empty!';
else if (!is_password($password)) $error['password'] = 'Password must include letters, numbers, and special characters!';
if ($password !== $repass) $error['repass'] = 'Password confirmation does not match';

if (empty($error)) {
  $database->insert(
    'users',
    array(
      'username' => $username,
      'email' => $email,
      'password' => password_hash($password, PASSWORD_BCRYPT)
    )
  );



  //Create an instance; passing `true` enables exceptions
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
    $error['mail'] = $e->getMessage();
  }
}



echo json_encode($error);
