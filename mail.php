<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect and sanitize input
    $name    = htmlspecialchars(trim($_POST["name"]));
    $from    = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validate input
    if (empty($name) || empty($from) || empty($message) || !filter_var($from, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.html?mail_status=invalid");
        exit;
    }

    // Mail settings
    $to      = "pranav.08wadge@gmail.com";  // your email
    $subject = "New message from Portfolio Website";

    // Message body
    $txt = "Name: $name\r\n";
    $txt .= "Email: $from\r\n\r\n";
    $txt .= "Message:\r\n$message\r\n";

    // Headers
    $headers  = "From: no-reply@yourdomain.com\r\n"; // safer "from"
    $headers .= "Reply-To: $from\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    $mail_status = mail($to, $subject, $txt, $headers);

    if ($mail_status) {
        header("Location: index.html?mail_status=sent");
    } else {
        header("Location: index.html?mail_status=error");
    }
}
?>
