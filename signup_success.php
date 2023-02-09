<?php require_once('config.php') ?>
<!-- config.php should be here as the first include  -->
<?php require_once(ROOT_PATH . '/includes/functions.php') ?>

<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); ?>
<?php $randomPosts = getRandomPosts(); ?>

<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>




<title>TML | SignUp Success</title>
</head>

<body>
    <div class="container">


        <?php include('includes/nav_bar.php') ?>
        <?php include('includes/loginbar.php') ?>

        <h1>Sign Up</h1>

        <p>Signup Successful.
            You can now <a href="login.php">Log In</a>.</p>

    </div>



    <!-- footer -->
    <?php include('includes/footer.php') ?>




    </div>
    <script src="static/js/script.js"></script>
</body>

</html>