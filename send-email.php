<?php

require_once('config.php');
require_once('includes/head_section.php');

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

//validate name field server side
if (empty($_POST["name"])) {
    die("Name is required!");
}

//validate email server side
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required!");
}

//validate subject field server side
if (empty($_POST["subject"])) {
    die("Subject is required!");
}

//validate message field server side
if (empty($_POST["message"])) {
    die("Message is required!");
}

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

// uncomment to debug if email not sent
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp-relay.sendinblue.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "tz2b7jr7nc@privaterelay.appleid.com";
$mail->Password = "AOBMr7zJFEhx46H0";

$mail->setFrom($email, $name);
$mail->addAddress("mr.mikesorrentino@gmail.com", "Admin");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

header("Location: sent_confirm.php");
