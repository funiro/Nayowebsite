<?php
    $path = dirname(__DIR__);
    require_once "$path/includes/functions.php";
    // Enable error reporting for debugging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    file_put_contents("$path/volunteer_form_handler.log", print_r($_POST, true), FILE_APPEND);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
                // Debug: Log all received data
                error_log("Received form data: " . print_r($_POST, true));

                // Optional: Fields to exclude from final data (e.g., honeypot or CSRF token)
                $excludedFields = ['csrf_token', 'honeypot'];

                $formData = [];

                foreach ($_POST as $key => $value) {
                    // Skip excluded fields
                    if (in_array($key, $excludedFields)) {
                        continue;
                    }

                    // Handle array values (e.g., checkboxes)
                    if (is_array($value)) {
                        $formData[$key] = implode(', ', array_map('trim', $value));
                    } else {
                        $formData[$key] = trim($value);
                    }
                }

                // Add submission timestamp
                $formData['Submission Date'] = date('Y-m-d H:i:s');
                // Output to browser (for testing; replace with DB insert or email if needed)
                // Load the email template
                $template = file_get_contents("$path/templates/volunteer_email_template.html");

                // Initialize replacements array
                $replacements = [];

                // Dynamically build replacements from form data
                foreach ($formData as $key => $value) {
                    $placeholder = '{' . $key . '}';

                    if (is_array($value)) {
                        // Format checkbox lists
                        if ($key === 'interests') {
                            $replacements[$placeholder] = formatListItems($value); // assuming formatListItems returns HTML list items
                        } else {
                            $replacements[$placeholder] = htmlspecialchars(implode(', ', $value));
                        }
                    } else {
                        // Preserve newlines where needed
                        if (in_array($key, ['skills', 'availability', 'why_volunteer'])) {
                            $replacements[$placeholder] = nl2br(htmlspecialchars($value));
                        } else {
                            $replacements[$placeholder] = htmlspecialchars($value);
                        }
                    }
                }

                // Do the replacements
                $body = str_replace(array_keys($replacements), array_values($replacements), $template);
                // Output or send email
                $recipient = "info@nayomalawi.org";
                $recipientname = "NAYO";
               // echo "before function\n";
                $sent = sendVolunteerEmail($formData, $recipient, $recipientname);
              //  echo "after function\n";
                // Resume from here
                if ($sent != 0) {
                    echo json_encode(['status' => 'success', 'message' => 'Application sent successfully']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to send message']);
                }
        } catch (Exception $e) {
            // Log any exception
            error_log("Error: " . $e->getMessage());
            echo "An error occurred while processing your submission.";
        }
    }
?>