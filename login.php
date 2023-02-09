<?php require_once('config.php') ?>
<!-- config.php should be here as the first include  -->
<?php require_once(ROOT_PATH . '/includes/functions.php') ?>


<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>

<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"]  === "POST") {

    // $conn = require __DIR__ . "config.php";

    $sql = sprintf(
        "SELECT * FROM users WHERE email = '%s'",
        $conn->real_escape_string($_POST["email"])
    );

    $result = $conn->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {

        if (password_verify($_POST["password"], $user["user_password"])) {

            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user"] = $user["username"];

            echo $user;


            //go to specific page
            header("location: index.php");



            exit;
        }
    }

    $is_invalid = true;
}

?>

<title>TML | Login</title>
</head>

<body>



    <?php include('includes/nav_bar.php') ?>
    <?php include('includes/loginbar.php') ?>

    <div class="login">
        <form method="POST">

            <h1>Login</h1>

            <?php if ($is_invalid) : ?>
            <em>Invalid Login</em>
            <?php endif; ?>

            <?php if ($is_invalid) :
                header("Location: login.php?newpwd=invalid");
            endif; ?>


            <div>
                <label for="email" id="label"><i class="fa-solid fa-envelope"></i></label>
                <input type="email" id="email" name="email" placeholder="Enter Email..."
                    value="<?= htmlspecialchars($_POST["email"] ?? " ") ?>">
            </div>

            <div>
                <label for="password" id="label"><i class="fa-solid fa-lock"></i></label>
                <input type="password" id="password" name="password" placeholder="Enter Password..." value=""><i
                    class="far fa-eye-slash" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
            </div>
            <button id="signup-btn">Log In</button>


        </form>

        <?php

        if (isset($_GET["newpwd"])) {
            if ($_GET["newpwd"] == "passwordupdated") {
                echo '<p class="signupsuccess">Your Password Has Been Updated!</p>';
            }
        }
        if (isset($_GET["newpwd"])) {
            if ($_GET["newpwd"] == "empty") {
                echo '<p class="signupsuccess">You Did Not Enter A password!</p>';
            }
        }
        if (isset($_GET["newpwd"])) {
            if ($_GET["newpwd"] == "pwdDoNotMatch") {
                echo '<p class="signupsuccess">The Passwords Did Not Match!</p>';
            }
        }
        if (isset($_GET["newpwd"])) {
            if ($_GET["newpwd"] == "invalid") {
                echo '<p class="signupsuccess">Your User Name or Password was incorrect!</p>';
            }
        }

        ?>


        <p id="link">Forgot your Password? <a href="resetPassword.php">Reset Password?</a></p>
        <p id="link">Not a Member? <a href="signup.php"> Sign Up Here!</a></p>
    </div>
    <!-- footer -->
    <?php include('includes/footer.php') ?>



    </div>

    <script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function() {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("fa-eye");
    });

    // prevent form submit
    // const form = document.querySelector("form");
    // form.addEventListener('submit', function(e) {
    //     e.preventDefault();
    // });
    </script>



    <script src="static/js/script.js"></script>
</body>

</html>