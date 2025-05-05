<?php
    require_once __DIR__ . '/../includes/functions.php';

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

            // Send email to NAYO
            $result = sendVolunteerEmail($formData, 'info@nayomalawi.org', 'NAYO Team');
            if ($result !== 1) {
                throw new Exception("Email sending failed: " . $result);
            }

            // Send confirmation to applicant
            $result = sendVolunteerEmail($formData, $formData['Email'], $formData['Name']);
            if ($result !== 1) {
                throw new Exception("Confirmation email failed: " . $result);
            }

            // Return success response
            //header('Content-Type: application/json');
            //echo json_encode(['success' => true, 'message' => 'Application submitted successfully']);
            echo "Application submited successfuly";
        } catch (Exception $e) {
            error_log("Email sending failed: " . $e->getMessage());
            echo json_encode([
                'success' => false,
                'message' => 'There was an error submitting your form. Please try again later.'
            ]);
            exit;
        }
    } else {
        echo json_encode([
            'success' => false, 
            'message' => 'Invalid request method'
        ]);
    }
?> 