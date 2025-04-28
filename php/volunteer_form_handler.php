<?php
require_once __DIR__ . '/mail_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Initialize mailer
    $mailer = new Mailer();
    
    // Send email
    $result = $mailer->sendVolunteerForm($formData);

    // Return response
    if ($result === true) {
        echo json_encode(['success' => true, 'message' => 'Thank you for your submission! We will contact you soon.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'There was an error submitting your form. Please try again later.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?> 