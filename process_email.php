<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the email
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Additional details you might want to save (modify as needed)
    $caseStudy = $_POST['case_study'];

    // Compose the data to be saved
    $data = "Email: $email\nCase Study: $caseStudy\n\n";

    // Specify the file path
    $filePath = "subscribers.txt";

    // Save the data to the text file
    if (file_put_contents($filePath, $data, FILE_APPEND | LOCK_EX) !== false) {
        // Email and details successfully added to the text file
        echo "Email and details successfully added to the text file.";
    } else {
        // Handle the error
        echo "Error saving data to the text file.";
    }
} else {
    // Handle non-POST requests if needed
    echo "Invalid request method.";
}

?>
