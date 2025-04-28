<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Mailer {
    private $mail;
    
    public function __construct() {
        $this->mail = new PHPMailer(true);
        
        // Server settings
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'nayomalawi@gmail.com'; // NAYO Malawi's Gmail
        $this->mail->Password = 'iawn yhxx bovi rlnc'; // App password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 587;
        
        // Sender settings
        $this->mail->setFrom('nayomalawi@gmail.com', 'NAYO Malawi');
    }
    
    public function sendVolunteerForm($formData) {
        try {
            // Add recipient
            $this->mail->addAddress('info@nayomalawi.org');
            
            // Set email format to HTML
            $this->mail->isHTML(true);
            
            // Set email subject
            $this->mail->Subject = 'New Volunteer Form Submission';
            
            // Create email body from form data
            $message = '<h2>New Volunteer Form Submission</h2>';
            $message .= '<table style="width:100%; border-collapse: collapse;">';
            
            foreach ($formData as $key => $value) {
                $message .= '<tr>';
                $message .= '<td style="padding: 8px; border: 1px solid #ddd;"><strong>' . htmlspecialchars($key) . '</strong></td>';
                $message .= '<td style="padding: 8px; border: 1px solid #ddd;">' . htmlspecialchars($value) . '</td>';
                $message .= '</tr>';
            }
            
            $message .= '</table>';
            
            $this->mail->Body = $message;
            
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}
?> 