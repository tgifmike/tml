<?php require_once('config.php') ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>



<title>TML | Reset Password</title>
</head>

<body>



    <?php include('includes/nav_bar.php') ?>
    <?php include('includes/loginbar.php') ?>

    <h1>Reseting Password</h1><br>



    <div class="login">

        <p>You will recieve an e-mail with instructions on how to reset your password.</p>


        <form action="reset-request.php" method="POST" id="reset">

            <!-- <form action="http://restmanagement.byethost5.com/includes/reset-password.php" method="post" id="reset"> -->


            <div>
                <label for="email" id="label"><i class="fa-solid fa-envelope"></i></label>
                <input type="email" id="email" name="email" placeholder="Enter Email..." required>
            </div>


            <button type="submit" name="reset-request-submit" id="reset-btn">Reset Password</button>


        </form>
        <?php
        if (isset($_GET["reset"])) {
            if ($_GET["reset"] == "success") {
                echo '<p class="resetsuccess">Check your Email!</p>';
            }
        }
        ?>

    </div>
    <!-- footer -->
    <?php include('includes/footer.php') ?>



    </div>





    <script src="static/js/script.js"></script>
</body>

</html>