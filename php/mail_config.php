<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

class Mailer {
    private $mail;
    
    public function __construct() {
        $this->mail = new PHPMailer(true);
        
        try {
            // Server settings
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'nayomalawi@gmail.com'; // NAYO Malawi's Gmail
            $this->mail->Password = 'mqni ftln uchq iqxa'; // App password
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port = 587;
            
            // Enhanced debugging
            $this->mail->SMTPDebug = 3; // Increased debug level
            $this->mail->Debugoutput = function($str, $level) {
                error_log("SMTP Debug [$level]: $str");
            };
            
            // Additional SMTP options
            $this->mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            
            // Sender settings
            $this->mail->setFrom('nayomalawi@gmail.com', 'NAYO Malawi');
            
            // Additional settings
            $this->mail->CharSet = 'UTF-8';
            $this->mail->Encoding = 'base64';
            
            // Test SMTP connection
            if (!$this->mail->smtpConnect()) {
                throw new Exception('SMTP connection failed');
            }
            
        } catch (Exception $e) {
            error_log("Mailer construction error: " . $e->getMessage());
            error_log("SMTP Error Info: " . $this->mail->ErrorInfo);
            throw new Exception("Mailer Error: " . $e->getMessage() . " | SMTP Error: " . $this->mail->ErrorInfo);
        }
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
            <div style="max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif; padding: 20px; background-color: #f8f9fa;">
                <h2 style="text-align: center; color: #2c3e50; margin-bottom: 20px;">New Volunteer Form Submission</h2>
                <table style="width: 100%; border-collapse: collapse; margin: 0 auto; background-color: #ffffff; box-shadow: 0 0 20px rgba(0,0,0,0.1); border-radius: 8px;">
                    <tr style="background-color: #2c3e50; color: white;">
                        <th style="padding: 15px; text-align: left; width: 40%;">Field</th>
                        <th style="padding: 15px; text-align: left; width: 60%;">Value</th>
                    </tr>';
            
            $rowCount = 0;
            foreach ($formData as $key => $value) {
                $rowCount++;
                $rowStyle = $rowCount % 2 === 0 ? 'background-color: #f8f9fa;' : '';
                
                // Special handling for Areas of Interest
                if ($key === 'Areas of Interest') {
                    $value = str_replace(',', '<br>• ', $value);
                    if (!empty($value)) {
                        $value = '• ' . $value;
                    }
                }
                
                $message .= '
                    <tr style="' . $rowStyle . '">
                        <td style="padding: 12px; border: 1px solid #ddd;"><strong>' . htmlspecialchars($key) . '</strong></td>
                        <td style="padding: 12px; border: 1px solid #ddd;">' . htmlspecialchars($value) . '</td>
                    </tr>';
            }
            
            $message .= '
                </table>
                <p style="text-align: center; margin-top: 20px; color: #666; font-size: 12px;">
                    This is an automated message from NAYO Malawi Volunteer Form
                </p>
            </div>';
            
            $this->mail->Body = $message;
            
            // Send email
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Mail sending error: " . $this->mail->ErrorInfo);
            return "Mailer Error: " . $this->mail->ErrorInfo;
        }
    }
}
?> 