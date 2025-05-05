<?php
    require "$path/vendor/autoload.php"; // adjust path if necessary
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    function sendVolunteerEmail($formData, $recipient, $recipientname) {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.hostinger.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'forms@nayomalawi.org'; // Update with your actual email
            $mail->Password   = 'Forms@V2025'; // App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('forms@nayomalawi.org', 'NAYO Volunteer Application');
            $mail->addAddress($recipient, $recipientname);

            // Load and process template
            $templatePath = __DIR__ . '/../templates/volunteer_email_template.html';
            $template = file_get_contents($templatePath);

            // Replace template variables
            $template = str_replace('{name}', $formData['Name'], $template);
            $template = str_replace('{email}', $formData['Email'], $template);
            $template = str_replace('{phone}', $formData['Phone'], $template);
            $template = str_replace('{skills}', $formData['Skills'], $template);
            $template = str_replace('{availability}', $formData['Availability'], $template);
            
            // Process interests into HTML list items
            $interestsList = '';
            if (!empty($formData['Areas of Interest'])) {
                $interests = explode(', ', $formData['Areas of Interest']);
                foreach ($interests as $interest) {
                    $interestsList .= "<li>$interest</li>";
                }
            }
            $template = str_replace('{interests}', $interestsList, $template);
            
            $template = str_replace('{why_volunteer}', $formData['Why Volunteer'], $template);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'New Volunteer Application from ' . $formData['Name'];
            $mail->Body    = $template;

            $mail->send();
            return 1;
            
        } catch (Exception $e) {
            return "Mailer Error: " . $mail->ErrorInfo;
        }
    }
?>