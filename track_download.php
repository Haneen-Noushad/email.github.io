<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process email collection (save to database, send confirmation, etc.)
    $email = $_POST['email'];

    // Track the download
    trackDownload();

    // Redirect to the actual download link
    header("Location: " . $_POST['download_link']);
    exit();
}

function trackDownload() {
    // Implement your download tracking logic here
    // For example, save the download information to a database
    // You can increment a counter, log IP addresses, etc.
    // For simplicity, I'm using a file to store the download count

    $file = 'download_count.txt';

    if (file_exists($file)) {
        $count = (int) file_get_contents($file);
        $count++;
    } else {
        $count = 1;
    }

    file_put_contents($file, $count);
}

?>
