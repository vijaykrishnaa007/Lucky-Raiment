<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Include autoload.php file
require 'vendor/autoload.php';
// Create object of PHPMailer class
$mail = new PHPMailer(true);

$output = '';

if (isset($_POST['submit'])) {
  $name_1 = $_POST['name_1'];
  $name_2 = $_POST['name_2'] ;
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];

  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    // Gmail ID which you want to use as SMTP server
    $mail->Username = 'luckyraimentdeveloper@gmail.com';
    // Gmail Password
    $mail->Password = 'shobhashobha';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Email ID from which you want to send the email
    $mail->setFrom('luckyraiment@gmail.com');
    // Recipient Email ID where you want to receive emails
    $mail->addAddress('luckyraiment@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Form Submission';
    $mail->Body = "<h3>Company Name : $name_1 <br>Person Name : $name_2 <br>Phone No : $phone <br>Email : $email <br>Message : $message</h3>";

    $mail->send();
    
  } catch (Exception $e) {
    $output = '<div class="alert alert-danger">
                <h5>' . $e->getMessage() . '</h5>
              </div>';
  }
}
?>
