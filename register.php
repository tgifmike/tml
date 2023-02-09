<?php require_once('config.php') ?>

<?php



//validate name field server side
if (empty($_POST["name"])) {
    die("Name is required!");
}

//validate email server side
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required!");
}
//validate password length server side
if (strlen($_POST["password"]) < 8) {
    die("password needs to be at least 8 characters");
}
//validate password has letter server side
if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("password must contain at least one letter");
}
//validate password has number server side
if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("password must contain at least one number");
}
//validate passwords match server side
if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// $conn = require __DIR__ . "/config.php";

$sql = "INSERT INTO users (username, email, user_password) VALUES (?, ?, ?)";

$stmt = $conn->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $conn->error);
}

$stmt->bind_param(
    "sss",
    $_POST["name"],
    $_POST["email"],
    $password_hash
);

if ($stmt->execute()) {

    header("Location: signup_success.php");
    exit;
} else {

    if ($conn->errno === 1062) {
        die("email already taken");
    } else {
        die($conn->error . " " . $conn->errno);
    }
}
