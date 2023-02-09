<?php require_once('config.php') ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>

<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
<script src="static/js/validation.js" defer></script>


<title>TML | Member Sign Up</title>
</head>

<body>
    <div class="container">


        <?php include('includes/nav_bar.php') ?>
        <?php include('includes/loginbar.php') ?>

        <h1>Member Sign Up</h1>

        <div class="signin">




            <form action="register.php" method="POST" id="signup">
                <div>
                    <label for="name" id="label"><i class="fa-solid fa-user"></i></label>
                    <input type="text" id="name" name="name" placeholder="Enter Name...">
                </div>

                <div>
                    <label for="email" id="label"><i class="fa-solid fa-envelope"></i></label>
                    <input type="email" id="email" name="email" placeholder="Enter Email...">
                </div>

                <div>
                    <label for="password" id="label"><i class="fa-solid fa-lock"></i></label>
                    <input type="password" id="password" name="password" placeholder="Enter Password..."><i
                        class="far fa-eye-slash" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                </div>

                <div>
                    <label for="password_confirmation" id="label"><i class="fa-solid fa-lock"></i></label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Re-Enter Password..."><i class="far fa-eye-slash" id="togglePasswordConfirmation"
                        style="margin-left: -30px; cursor: pointer;"></i>
                </div>

                <button id=signup-btn>Register</button>


            </form>

            <p id="link"> Already a Member? <a href="login.php"> Log In</a></p>

        </div>




        <!-- footer -->
        <?php include('includes/footer.php') ?>




    </div>
    <script>
    const togglePassword = document.querySelector("#togglePassword");
    const togglePasswordConfirmation = document.querySelector("#togglePasswordConfirmation");

    const password = document.querySelector("#password");
    const passwordConfirmation = document.querySelector("#password_confirmation");

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

    // prevent form submit
    // const form = document.querySelector("form");
    // form.addEventListener('submit', function(e) {
    //     e.preventDefault();
    // });
    </script>

    <script src="static/js/script.js"></script>
</body>

</html>