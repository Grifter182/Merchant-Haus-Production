<?php
header('Content-Type: application/json');

$name = htmlspecialchars($_POST['name'] ?? '');
$email = htmlspecialchars($_POST['email'] ?? '');
$message = htmlspecialchars($_POST['message'] ?? '');

if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Please fill out all fields with valid information.']);
    return;
}

// In a real application, you would send an email here.
// Example: mail('support@merchanthaus.io', 'New Support Request from ' . $name, $message, 'From: ' . $email);

echo json_encode(['success' => true, 'message' => 'Support request sent successfully.']);
?>
