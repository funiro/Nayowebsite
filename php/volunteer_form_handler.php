<?php
require_once __DIR__ . '/mail_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $formData = array(
        'Name' => $_POST['name'] ?? '',
        'Email' => $_POST['email'] ?? '',
        'Phone' => $_POST['phone'] ?? '',
        'Address' => $_POST['address'] ?? '',
        'Date of Birth' => $_POST['dob'] ?? '',
        'Gender' => $_POST['gender'] ?? '',
        'Education Level' => $_POST['education'] ?? '',
        'Skills' => $_POST['skills'] ?? '',
        'Areas of Interest' => isset($_POST['interests']) ? implode(', ', $_POST['interests']) : '',
        'Availability' => $_POST['availability'] ?? '',
        'Previous Volunteer Experience' => $_POST['experience'] ?? '',
        'Why Volunteer' => $_POST['why_volunteer'] ?? '',
        'Emergency Contact' => $_POST['emergency_contact'] ?? '',
        'Relationship' => $_POST['relationship'] ?? '',
        'Contact Number' => $_POST['contact_number'] ?? '',
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