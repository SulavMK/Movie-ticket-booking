<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'kesu.dhami@gmail.com';          // SMTP username
$mail->Password = 'aeiu@024611'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('kesu.dhami@gmail.com', 'Keshav Dhami');
$mail->addReplyTo('kesu.dhami@gmail.com', 'Euphoria');
$mail->addAddress('keshav.dhami@sagarmatha.edu.np');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

//$bodyContent = '<h1>How to Send Email using PHP in Localhost by CodexWorld</h1>';
//$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script by <b>CodexWorld</b></p>';

$mail->Subject = 'Email from Localhost by keshav dhami';
$mail->Body    = '<h1 align="center">
How to Send Email using PHP in Localhost by Keshav Dhami</h1>';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>