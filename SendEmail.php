<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get and sanitize form fields
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Basic validation (does not break UX)
    if ($name === '' || $email === '' || $message === '') {
        echo "Please fill in all fields.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address.";
        exit;
    }

    // Prevent email header injection
    $name = str_replace(["\r", "\n"], '', $name);
    $email = str_replace(["\r", "\n"], '', $email);

    // Recipient email
    $to = "stelios.yolokrom@gmail.com";

    // Email subject
    $subject = "New Contact Form Submission from $name";

    // Email content
    $email_content  = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Email headers (improved but safe)
    $headers  = "From: TLK Games <no-reply@yourdomain.com>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        header("Location: thank_you.html");
        exit;
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }

} else {
    echo "There was a problem with your submission. Please try again.";
}
?>
