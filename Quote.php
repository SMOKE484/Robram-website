<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);
    $services = isset($_POST['services']) ? implode(", ", $_POST['services']) : "No services selected";  // Collect services selected

    // Prepare email content
    $to = "vhulendamashamba4@gmail.com";  // Replace with the business owner's email address
    $subject = "New Quotation Request from $name";
    $body = "
    Name: $name\n
    Email: $email\n
    Phone: $phone\n
    Services Requested: $services\n
    Message: $message
    ";

    // Set the headers for the email
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Sorry, there was an error sending your message.";
    }
}
?>
