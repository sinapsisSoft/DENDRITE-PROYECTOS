<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.hostinger.co';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'contact@dendrite.com.co';                     // SMTP username
    $mail->Password   = 'Sinapsis2020*';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('contact@dendrite.com.co', 'DENDRITE - APP');
    $mail->addAddress('d.casallas@sinapsist.com.co', 'Diego Casallas');     // Add a recipient
    $mail->addAddress('diehercasvan@gmail.com', 'Information Para Diego Casallas');     // Add a recipient
    $mail->addAddress('l.grisales@sinapsist.com.co','Information Para Laura Grisales');               // Name is optional
    $mail->addReplyTo('diehercasvan@gmail.com', 'Information Diego Casallas');
    $mail->addCC('info@sinapsist.com.co');
    //$mail->addBCC('info@sinapsist.com.co');

    // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Test Email PHP MAILER';
    $mail->Body    = '<h1>This is the test message in HTML</h1> <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail dendrite';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}