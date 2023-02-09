<?php
require('config.php');



// if (isset($_POST["reset-password-submit"])) {
const y = 1;
if (y == 1) {


    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $passwordReset = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];


    if (empty($passwordReset) || empty($passwordRepeat)) {
        //might have to go to sign up pagae
        header("Location: login.php?newpwd=empty");
        exit();
    } else if ($passwordReset != $passwordRepeat) {
        header("Location: login.php?newpwd=pwdDoNotMatch");
        exit();
    }

    $currentDate = date("U");



    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector = ? AND pwdResetExpires >= ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error! token expired";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $results = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($results)) {
            echo "There was an error! 2";
            exit();
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

            if ($tokenCheck === false) {
                echo "There was an error! token not correct";
                exit();
            } elseif ($tokenCheck === true) {
                $tokenEmail = $row["pwdResetEmail"];

                $sql = "SELECT * FROM users WHERE email=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There was an error! email not in db";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "There was an error! 3";
                        exit();
                    } else {
                        $newPwdHash = password_hash($passwordReset, PASSWORD_DEFAULT);
                        $sql = "UPDATE users SET user_password=? WHERE email=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error! did not push to db";
                            exit();
                        } else {

                            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "There was an error! did not delete token";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: login.php?newpwd=passwordupdated");
                            }
                        }
                    }
                }
            }
        }
    }
} else {
    header("Location: index.php?newpwd=failed");
}