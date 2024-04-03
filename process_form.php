<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['your_name'];
    $phone = $_POST['your_phone'];
    $email = $_POST['your_email'];
    $organization = $_POST['organization'];
    $message = $_POST['your_message'];

    // Validate form data (add your own validation logic as needed)

    // Construct email message
    $subject = "New Inquiry from Landing page";
    $to = "sales@globalbeamtelecom.com"; // Replace with your email address
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    $email_message = "Name: $name\n";
    $email_message .= "Phone: $phone\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Organization: $organization\n";
    $email_message .= "Message:\n$message";

    // Send email
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Thank you! Your inquiry has been sent.";
    } else {
        echo "Error: Unable to send the inquiry.";
    }
} else {
    // Handle non-POST requests if needed
    echo "Invalid request method.";
}
?>
