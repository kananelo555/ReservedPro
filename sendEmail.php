<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form data is being received
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
        die("Form data is missing.");
    }

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Debug: Output variables to ensure they are being set correctly
    echo "Name: $name<br>Email: $email<br>Subject: $subject<br>Message: $message<br>";

    $to = "wayne@reservedpro.co.za, marketing@reservedpro.co.za";
    $headers = "From: " . $email;

    $emailBody = "Name: $name\n";
    $emailBody .= "Email: $email\n";
    $emailBody .= "Subject: $subject\n";
    $emailBody .= "Message:\n$message\n";

    // Debug: Check if mail() function returns true
    if (mail($to, $subject, $emailBody, $headers)) {
        echo "Your message was sent successfully!";
    } else {
        echo "There was a problem sending your message.";
    }
}
?>
