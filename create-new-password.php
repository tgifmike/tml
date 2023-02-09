<?php require_once('config.php') ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>

<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
<script src="static/js/validationPasswordReset.js" defer></script>


<title>TML | Create New Password</title>
</head>

<body>



    <?php include('includes/nav_bar.php') ?>
    <?php include('includes/loginbar.php') ?>
    <div class="login">
        <h1>Creating New Password</h1>

        <br><br>
        <p>Please Enter a new Password, Password Must Contain Minimum Of Eight Characters, At Least One Letter And One
            Number.</p>
        <br><br>

        <?php

        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if (empty($selector) || empty($validator)) {
            echo "Could not validate your request!";
        } else {
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {

        ?>

        <form action="reset-password.php" method="POST" id="passwordReset">

            <input type="hidden" name="selector" value="<?php echo $selector; ?>">
            <input type="hidden" name="validator" value="<?php echo $validator; ?>">

            <div>
                <input id="pwdReset" type="password" name="pwd" placeholder="Enter a new password..."><i
                    class="far fa-eye-slash" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
            </div>

            <div>
                <input id="pwdReset-repeat" type="password" name="pwd-repeat" placeholder="Repeat new password..."><i
                    class="far fa-eye-slash" id="togglePasswordConfirmation"
                    style="margin-left: -30px; cursor: pointer;"></i>
            </div>

            <button id="pwdResetBtn" type="submit" name="reset-password-submit">Create New Password</button>
        </form>


        <?php




            }
        }

        ?>



    </div>
    <!-- footer -->
    <?php include('includes/footer.php') ?>



    </div>

    <script>
    const togglePassword = document.querySelector("#togglePassword");
    const togglePasswordConfirmation = document.querySelector("#togglePasswordConfirmation");

    const password = document.querySelector("#pwdReset");
    const passwordConfirmation = document.querySelector("#pwdReset-repeat");

    togglePassword.addEventListener("click", function() {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("fa-eye");
    });

    togglePasswordConfirmation.addEventListener("click", function() {
        // toggle the type attribute
        const type = passwordConfirmation.getAttribute("type") === "password" ? "text" : "password";
        passwordConfirmation.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("fa-eye");
    });

    //prevent form submit
    // const form = document.querySelector("form");
    // form.addEventListener('submit', function(e) {
    //     e.preventDefault();
    // });
    </script>



    <script src="static/js/script.js"></script>
</body>

</html>