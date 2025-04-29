<?php
require_once __DIR__ . '/mail_config.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Debug: Log received data
        error_log("Received form data: " . print_r($_POST, true));

        // Collect only essential form data
        $formData = array(
            'Name' => $_POST['name'] ?? '',
            'Email' => $_POST['email'] ?? '',
            'Phone' => $_POST['phone'] ?? '',
            'Areas of Interest' => isset($_POST['interests']) ? implode(', ', $_POST['interests']) : '',
            'Availability' => $_POST['availability'] ?? '',
            'Skills' => $_POST['skills'] ?? '',
            'Why Volunteer' => $_POST['why_volunteer'] ?? '',
            'Submission Date' => date('Y-m-d H:i:s')
        );

        // Debug: Log processed data
        error_log("Processed form data: " . print_r($formData, true));

        // Initialize mailer
        $mailer = new Mailer();
        
        // Send email
        $result = $mailer->sendVolunteerForm($formData);

        // Debug: Log result
        error_log("Mail sending result: " . print_r($result, true));

        // Return response
        if ($result === true) {
            echo json_encode([
                'success' => true, 
                'message' => 'Thank you for your submission! We will contact you soon.',
                'debug' => 'Email sent successfully'
            ]);
        } else {
            echo json_encode([
                'success' => false, 
                'message' => 'There was an error submitting your form. Please try again later.',
                'debug' => 'SMTP Error: ' . $result
            ]);
        }
    } catch (Exception $e) {
        // Debug: Log exception
        error_log("Exception occurred: " . $e->getMessage());
        
        echo json_encode([
            'success' => false, 
            'message' => 'There was an error submitting your form. Please try again later.',
            'debug' => 'Exception: ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'success' => false, 
        'message' => 'Invalid request method',
        'debug' => 'Request method: ' . $_SERVER['REQUEST_METHOD']
    ]);
}
?> 