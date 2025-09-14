<?php
// Set the content type for all responses to JSON
header('Content-Type: application/json');

// A simple router that directs requests based on the 'action' GET parameter
$action = $_GET['action'] ?? '';

switch ($action) {
    case 'gemini-chat':
        handle_gemini_chat();
        break;
    case 'support':
        handle_support();
        break;
    case 'signup':
        handle_signup();
        break;
    default:
        // Handle invalid actions
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Invalid action specified.']);
}

/**
 * Handles the AI-powered FAQ request.
 * This function simulates a response from the Gemini API.
 */
function handle_gemini_chat() {
    // In a real application, you would securely load your API key here
    // $apiKey = getenv('GEMINI_API_KEY');

    // Get the raw POST data and decode it from JSON
    $input = json_decode(file_get_contents('php://input'), true);
    $prompt = $input['prompt'] ?? '';

    if (empty($prompt)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'A prompt is required.']);
        return;
    }

    // --- DUMMY RESPONSE SECTION (START) ---
    // This part simulates a call to an AI model for demonstration purposes.
    // Replace this with a real cURL request to the Google Gemini API in production.
    $dummy_responses = [
        'pricing' => 'Our pricing is highly competitive. We offer a **flat rate** of **2.9% + 30¢** for both card-present and online transactions. For businesses with high transaction volumes, custom rates are available. *Please contact our sales team for more details.*',
        'features' => 'We provide a comprehensive suite of features, including: * **Payment Links & Invoicing** * **Recurring Subscription Billing** * **Secure Customer Data Tokenization** * **Detailed Transaction Reporting** * **Direct Bank Payments & ACH**',
        'security' => 'Security is our highest priority. Our platform is fully **PCI DSS compliant**, and we use advanced, secure tokenization to protect sensitive customer data. Our systems also include sophisticated fraud detection algorithms to help minimize chargebacks.',
        'default' => 'Thank you for your question! MerchantHaus offers a full range of payment solutions designed for businesses of all sizes. You can ask me about our **pricing**, **features**, or **security** measures.'
    ];

    $reply = $dummy_responses['default'];
    // Simple keyword matching to provide a relevant dummy response
    foreach ($dummy_responses as $key => $response) {
        if (stripos($prompt, $key) !== false) {
            $reply = $response;
            break;
        }
    }
    // --- DUMMY RESPONSE SECTION (END) ---

    echo json_encode(['reply' => $reply]);
}

/**
 * Handles the contact support form submission.
 */
function handle_support() {
    // Sanitize and retrieve POST data
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    // Validate the input
    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Please fill out all fields with valid information.']);
        return;
    }

    // In a real application, you would send an email here.
    // Example: mail('support@merchanthaus.io', 'New Support Request from ' . $name, $message, 'From: ' . $email);

    // Simulate a successful operation
    echo json_encode(['success' => true, 'message' => 'Support request sent successfully.']);
}

/**
 * Handles the multi-step signup form submission.
 */
function handle_signup() {
    // Sanitize and retrieve data from all steps of the form
    $firstName = htmlspecialchars($_POST['firstName'] ?? '');
    $lastName = htmlspecialchars($_POST['lastName'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $companyName = htmlspecialchars($_POST['companyName'] ?? '');
    $username = htmlspecialchars($_POST['username'] ?? '');
    $terms = isset($_POST['terms']);

    // Validate the input from all steps
    if (empty($firstName) || empty($lastName) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($companyName) || empty($username) || !$terms) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Please complete all required fields and agree to the terms.']);
        return;
    }

    // In a real application, you would create a user in your database here.
    // Example: createUserInDatabase($firstName, $lastName, $email, $companyName, $username);

    // Simulate a successful account creation
    echo json_encode(['success' => true, 'message' => 'Account created successfully.']);
}

?>
