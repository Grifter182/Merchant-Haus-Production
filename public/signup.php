<?php
header('Content-Type: application/json');

$firstName = htmlspecialchars($_POST['firstName'] ?? '');
$lastName = htmlspecialchars($_POST['lastName'] ?? '');
$email = htmlspecialchars($_POST['email'] ?? '');
$companyName = htmlspecialchars($_POST['companyName'] ?? '');
$username = htmlspecialchars($_POST['username'] ?? '');
$terms = isset($_POST['terms']);

if (empty($firstName) || empty($lastName) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($companyName) || empty($username) || !$terms) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Please complete all required fields and agree to the terms.']);
    return;
}

// In a real application, you would create a user in your database here.
// Example: createUserInDatabase($firstName, $lastName, $email, $companyName, $username);

echo json_encode(['success' => true, 'message' => 'Account created successfully.']);
?>
