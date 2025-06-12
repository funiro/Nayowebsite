<?php
    require "$path/vendor/autoload.php"; // adjust path if necessary
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    //------- List formatting function -------

    function formatListItems($items) {
        if (is_array($items)) {
            return implode('', array_map(function($item) {
                return '<li>' . htmlspecialchars($item) . '</li>';
            }, $items));
        }
        return '<li>' . htmlspecialchars($items) . '</li>';
    }

    //------- Sending Email -------------
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
            $templatePath = __DIR__ . '../templates/volunteer_email_template.html';
            $template = file_get_contents($templatePath);

            // Replace template variables
            $template = str_replace('{name}', $formData['fullname'], $template);
            $template = str_replace('{email}', $formData['email'], $template);
            $template = str_replace('{phone}', $formData['phone'], $template);
            $template = str_replace('{skills}', $formData['skills'], $template);
            $template = str_replace('{availability}', $formData['availability'], $template);
            
            // Process interests into HTML list items
            $interestsList = '';
            if (!empty($formData['interests'])) {
                $interests = explode(', ', $formData['interests']);
                foreach ($interests as $interest) {
                    $interestsList .= "<li>$interest</li>";
                }
            }
            $template = str_replace('{interests}', $interestsList, $template);
            
            $template = str_replace('{why_volunteer}', $formData['why_volunteer'], $template);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'New Volunteer Application from ' . $formData['fullname'];
            $mail->Body    = $template;

            $mail->send();
            return 1;
            
        } catch (Exception $e) {
            return "Mailer Error: " . $mail->ErrorInfo;
        }
    }
?>