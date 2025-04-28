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
            $message = '
            <div style="max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif;">
                <h2 style="text-align: center; color: #2c3e50; margin-bottom: 20px;">New Volunteer Form Submission</h2>
                <table style="width: 100%; border-collapse: collapse; margin: 0 auto;">
                    <tr style="background-color: #f8f9fa;">
                        <th style="padding: 12px; border: 1px solid #ddd; text-align: left; width: 40%;">Field</th>
                        <th style="padding: 12px; border: 1px solid #ddd; text-align: left; width: 60%;">Value</th>
                    </tr>';
            
            foreach ($formData as $key => $value) {
                $message .= '
                    <tr>
                        <td style="padding: 12px; border: 1px solid #ddd;"><strong>' . htmlspecialchars($key) . '</strong></td>
                        <td style="padding: 12px; border: 1px solid #ddd;">' . htmlspecialchars($value) . '</td>
                    </tr>';
            }
            
            $message .= '
                </table>
                <p style="text-align: center; margin-top: 20px; color: #666;">
                    This is an automated message from NAYO Malawi Volunteer Form
                </p>
            </div>';
            
            $this->mail->Body = $message;
            
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}
?> 