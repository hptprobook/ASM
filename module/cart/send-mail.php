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
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$ship_name = $_GET['ship_name'];
$ship_address = $_GET['ship_address'];
$ship_email = trim($_GET['ship_email'], '"');
$ship_date = $_GET['ship_date'];
$orders = json_decode($_GET['user_carts'], true);
$total_amount = 0;

foreach ($orders as $order) {
    $total_amount += $order['subtotal'];
}

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

    // Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Thanks for ordering!';
    $mail->Body = '
    <html>
    <body>
        <p>Hello ' . $ship_name . ',</p>
        <p>We have received your order placed on ' . $ship_date . ', sent to address ' . $ship_address . '. Thank you for trusting us</p>
        <h2>Order Details</h2>
        <table border="1">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>SubTotal</th>
            </tr>';

    foreach ($orders as $item) {
        $mail->Body .= '
            <tr>
                <td>' . $item['name'] . '</td>
                <td>' . $item['quantity'] . '</td>
                <td>$' . $item['price'] . '</td>
                <td>$'. $item['subtotal']. '</td>
            </tr>';
    }

    $mail->Body .= '
        </table>
        <p>Total: $'. $total_amount. '</p>
        <p>Thank you!</p>
    </body>
    </html>';
    $mail->AltBody = 'Hello ' . $ship_name . '. We have received your order placed on ' . $ship_date . ', sent to address ' . $ship_address . '. Thank you for trusting us';

    $mail->send();

    date_default_timezone_set('Asia/Bangkok');

    $options = array(
        'cluster' => 'ap1',
        'useTLS' => true
    );
    $pusher = new Pusher\Pusher(
        'ebd4b083a7bb57c525d6',
        '79eab78080c69e751ef5',
        '1646892',
        $options
    );

    $data = array(
        'subject' => 'Nhận được đơn hàng mới',
        'content' => 'Có đơn hàng mới từ khách hàng, vào xác nhận ngay!',
        'time' => date('Y-m-d H:i:s')
    );
    $database->insert('admin_notify', $data);
    $pusher->trigger('my-channel', 'my-event', $data);
    header('Location: ?mod=user&act=order&is_checked_out=true');
} catch (Exception $e) {
    echo "<div class='alert alert-error text-center'>Order Failure. Mailer Error: {$mail->ErrorInfo}</div>";
}

?>

<? $template->getHeader(); ?>
<? $template->getFooter(); ?>

