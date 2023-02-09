<?php require_once('config.php') ?>
<!-- config.php should be here as the first include  -->
<?php require_once(ROOT_PATH . '/includes/functions.php') ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>

<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
<script src="static/js/validation.js" defer></script>


<title>TML | Contact Us</title>
</head>

<body>



    <?php include('includes/nav_bar.php') ?>
    <?php include('includes/loginbar.php') ?>

    <div class="container">

        <h3>Contact Us</h3>

        <div class="contactUs">
            <form method="post" action="send-email.php">

                <label for="name">Name</label>
                <input type="text" name="name" id="contactName" required>

                <label for="email">Email</label>
                <input type="email" name="email" id="contactEmail" required>

                <label for="subject">Subject</label>
                <input type="text" name="subject" id="contactSubject" required>

                <label for="message">Message</label>
                <textarea name="message" id="contactMessage" required style="height: 200px"></textarea>

                <br>

                <button id="sendBtn">SEND</button>
            </form>


        </div>

        <!-- footer -->
        <?php include('includes/footer.php') ?>




    </div>


    <script src="static/js/script.js"></script>
</body>

</html>