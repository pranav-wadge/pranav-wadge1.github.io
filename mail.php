<?php

    $name = $_POST["name"];
    $from = $_POST["email"];
    $subject = "Wiadomość ze strony portfolio";
    $to = "damian.duda2302@gmail.com";
    $message = $_POST["message"];

    $txt = "Imię " . $name . "\r\n" . "Email: " . $from . "\r\n" . "\r\n" . "Treść: " . $message;

    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: " . $from . "\r\n";

    $mail_status = mail(
        $to,
        $subject,
        $txt,
        $headers
    );

    if ($mail_status) {
        header("Location: /index.html?mail_status=sent");
    } else {
        header("Location: index.html?mail_status=error");
    }

?>