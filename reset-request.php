<?php
require('config.php');
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


// if (isset($_POST["reset-request-submit"])) {

const x = 1;

if (x == 1) {


    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://restmanagement.byethost5.com/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;




    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error! sql statement failed";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error! sql statement failed";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);



    // require "../vendor/autoload.php";

    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;

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

    $mail->setFrom("mr.mikesorrentino@gmail.com", "Admin");
    $mail->addAddress($userEmail);

    $subject = "Reset Your Password from The Manager Life";
    $message = "<p>We have recieved a password reset request.  The link to reset your password is below.  If you did NOT make this request, you can ignore this email.</p>";

    $message .= "<p>Here is your password reset Link: <br>";
    $message .= '<a href = "' . $url . '">' . $url . '</a></p>';

    // $message .= "From: TML <mr.mikesorrentino@gmail.com>\r\n";
    // $message .= "Reply-To: mr.mikesorrentino@gmail.com\r\n";
    // $message .= "Content-type: text/html\r\n";

    $mail->Subject = $subject;
    $mail->Body = $message;


    $mail->Send();

    header("Location: resetPassword.php?reset=success");
} else {
    header("Location: index.php");
};