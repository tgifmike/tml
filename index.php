<?php require_once('config.php') ?>
<?php require_once(ROOT_PATH . '/includes/functions.php') ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>


<title>The Manager Life</title>
</head>

<body>



    <?php include('includes/nav_bar.php') ?>
    <?php include('includes/loginbar.php') ?>




    <?php

    if (isset($GET_["newpwd"])) {
        if ($_GET["newpwd"] == "failed") {
            echo '<p class="signupsuccess">error at top</p>';
        }
    }

    ?>
    <section class="parallax-container">
        <h1 id="indexTitle">The Manager Life</h1>
        <div class="backGround"></div>
        <!-- <p>
            Cerro Torre is a mountain of sheer beauty whose spectacular attributes
            make it an unique gem in Argentina.
        </p> -->
    </section>

    <section class="buffer"></section>

    <section class="parallax-container parallax-container2">
        <div class="card">
            <div class="card-img"></div>
            <h3 id="indexH3">Increase Sales</h3>
            <p id="indexP">Sales hide many evils. The higher the sales the more evils are hidden.</p>
            <a href="sales_blog.php" id="indexA">Learn more</a>
        </div>
        <div class="card">
            <div class="card-img"></div>
            <h3 id="indexH3">BOH Best Practices</h3>
            <p id="indexP">Explore the myriad of ways to better organize and be effecient in the BOH.</p>
            <a href="profit_blog.php" id="indexA">Learn more</a>
        </div>
        <div class="card">
            <div class="card-img"></div>
            <h3 id="indexH3">Maximize Profits</h3>
            <p id="indexP">Learn ways to improve profit margins. Understand how to maintain profits.</p>
            <a href="profit_blog.php" id="indexA">Learn more</a>
        </div>
        <div class="card">
            <div class="card-img"></div>
            <h3 id="indexH3">Cutting Costs</h3>
            <p id="indexP">Find uniuqe and time honored cost cutting tips and stategies.</p>
            <a href="cost_blog.php" id="indexA">Learn more</a>
        </div>
    </section>

    <section class="buffer"></section>





    <!--footer-->
    <?php include('includes/footer.php') ?>

    <script src="static/js/script.js">
    </script>




</body>

</html>