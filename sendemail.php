<?php
// Set your email address here
$to = "DEREK@BIRDSEYEMANAGEMENTSERVICES.COM"; // ← REPLACE with your actual email

// Get and sanitize form fields
$name    = htmlspecialchars(trim($_POST["name"] ?? ''));
$phone   = htmlspecialchars(trim($_POST["phone"] ?? ''));
$message = htmlspecialchars(trim($_POST["message"] ?? ''));

// Validate required fields
if (empty($name) || empty($phone)) {
  echo "Please provide both your name and phone number.";
  exit;
}

// Email subject and content
$subject = "New Consultation Request from Real Estate Listing";
$body = "You have received a new message from your listing page:\n\n"
      . "Name: $name\n"
      . "Phone: $phone\n"
      . "Message:\n$message\n";

// Set headers
$headers = "From: no-reply@yourdomain.com\r\n";
$headers .= "Reply-To: $to\r\n";

// Send the email
if (mail($to, $subject, $body, $headers)) {
  echo "Thank you! Your request has been sent.";
} else {
  echo "Sorry, something went wrong. Please try again later.";
}
?>
