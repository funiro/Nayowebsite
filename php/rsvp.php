<?php
header('Content-Type: application/json');

require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Get form data
$data = json_decode(file_get_contents('php://input'), true);

// Validate required fields
$required_fields = ['name', 'email', 'phone', 'volunteer', 'dietary', 'eventId'];
foreach ($required_fields as $field) {
    if (!isset($data[$field])) {
        echo json_encode(['success' => false, 'message' => "Missing required field: $field"]);
        exit;
    }
}

// Get event details
$eventId = $data['eventId'];
$event = getEventDetails($eventId);

if (!$event) {
    echo json_encode(['success' => false, 'message' => 'Event not found']);
    exit;
}

// Prepare email content
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'nayomalawi@gmail.com';
    $mail->Password = 'iawn yhxx bovi rlnc';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('nayomalawi@gmail.com', 'NAYO Malawi');
    $mail->addAddress('events@nayomalawi.org');
    $mail->addReplyTo($data['email'], $data['name']);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Event RSVP - ' . $event['title'];
    
    $body = "
    <h2>New Event RSVP</h2>
    <p><strong>Event:</strong> {$event['title']}</p>
    <p><strong>Date:</strong> " . date('F j, Y', strtotime($event['date'])) . "</p>
    <p><strong>Name:</strong> {$data['name']}</p>
    <p><strong>Email:</strong> {$data['email']}</p>
    <p><strong>Phone:</strong> {$data['phone']}</p>
    <p><strong>Volunteer:</strong> " . ($data['volunteer'] == 'yes' ? 'Yes' : 'No') . "</p>
    <p><strong>Dietary Requirements:</strong><br>" . nl2br($data['dietary']) . "</p>
    ";

    $mail->Body = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();

    // Send confirmation to user
    $confirmationMail = new PHPMailer(true);
    
    $confirmationMail->isSMTP();
    $confirmationMail->Host = 'smtp.gmail.com';
    $confirmationMail->SMTPAuth = true;
    $confirmationMail->Username = 'nayomalawi@gmail.com';
    $confirmationMail->Password = 'iawn yhxx bovi rlnc';
    $confirmationMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $confirmationMail->Port = 587;

    $confirmationMail->setFrom('nayomalawi@gmail.com', 'NAYO Malawi');
    $confirmationMail->addAddress($data['email']);

    $confirmationMail->isHTML(true);
    $confirmationMail->Subject = 'Thank you for RSVPing to ' . $event['title'];
    
    $confirmationBody = "
    <h2>Thank you for RSVPing!</h2>
    <p>Thank you for registering for " . $event['title'] . ". We look forward to seeing you on " . date('F j, Y', strtotime($event['date'])) . ".</p>
    <p><strong>Event Details:</strong><br>
    {$event['description']}</p>
    <p><strong>Location:</strong><br>
    {$event['location']}</p>
    <p><strong>Time:</strong><br>
    {$event['time']}</p>
    ";

    if ($data['volunteer'] == 'yes') {
        $confirmationBody .= "
        <p><strong>Volunteer Information:</strong><br>
        Thank you for volunteering! We will contact you with more details about your volunteer role.</p>
        ";
    }

    if (!empty($data['dietary'])) {
        $confirmationBody .= "
        <p><strong>Dietary Requirements:</strong><br>
        " . nl2br($data['dietary']) . "</p>
        ";
    }

    $confirmationMail->Body = $confirmationBody;
    $confirmationMail->AltBody = strip_tags($confirmationBody);

    $confirmationMail->send();

    echo json_encode(['success' => true, 'message' => 'RSVP submitted successfully!']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error sending email: ' . $mail->ErrorInfo]);
}

// Helper function to get event details
function getEventDetails($eventId) {
    $events = [
        1 => [
            'id' => 1,
            'title' => 'Christmas for the Elderly',
            'date' => '2025-12-25',
            'time' => '10:00 - 16:00',
            'location' => 'Nancholi Community Center',
            'description' => 'Join us for a heartwarming celebration as we bring the joy of Christmas to our elderly community members.',
            'status' => 'upcoming',
            'rsvp' => true
        ],
        // Add more events as needed
    ];

    return isset($events[$eventId]) ? $events[$eventId] : null;
}
?>
