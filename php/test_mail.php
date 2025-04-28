<?php
require_once 'mail_config.php';

$mailer = new Mailer();

// Example usage
$to = 'recipient@example.com';
$subject = 'Test Email';
$message = '<h1>Hello!</h1><p>This is a test email sent using PHPMailer.</p>';

$result = $mailer->sendEmail($to, $subject, $message);

if ($result === true) {
    echo 'Email sent successfully!';
} else {
    echo $result;
}
?> 