<?php require_once('config.php') ?>
<!-- config.php should be here as the first include  -->
<?php require_once(ROOT_PATH . '/includes/functions.php') ?>
<!-- Retrieve all posts from database  -->

<?php $getSalesPosts = getSalesPosts(); ?>
<?php $showLikes = showLikes(); ?>

<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>


<title>TML | Sales Blog</title>
</head>

<body>
    <div class="container">


        <?php include('includes/nav_bar.php') ?>
        <?php include('includes/loginbar.php') ?>
        <?php include('includes/breadCrumbBlog.php') ?>


        <h1>Building Sales Blogs</h1>

        <div class="content">




            <!-- Add this ... -->
            <?php foreach ($getSalesPosts as $getSalesPost) : ?>
            <div class="post" style="margin-left: 0px;">


                <img src="<?php echo  'static/images/' . $getSalesPost['image']; ?>" class="post_image"
                    alt="<?php echo $getSalesPost['image_alt'] ?>">

                <div class="post_title">
                    <h2><?php echo $getSalesPost['title'] ?></h2>
                </div>
                <div class="post_body">
                    <p><?php echo $getSalesPost['slug'] ?>
                        <a href="<?php echo $getSalesPost['url'] ?>">Read full Article</a>
                    </p>
                    <span class="likeSpan">
                        <?php foreach ($showLikes as $showLike) : ?>
                        <?php if ($showLike["id"] == $getSalesPost["id"]) : ?>
                        <?php echo $showLike["likes"]; ?>

                        <?php endif ?>
                        <?php endforeach ?> Likes
                    </span>

                    <span class="post_date">Published
                        <?php echo date("F j, Y ", strtotime($getSalesPost["created_at"])); ?></span>
                    <!-- <span class="read_more">Read more...</span> -->

                </div>
                <!-- </div> -->
                <!-- </a> -->
            </div>
            <?php endforeach ?>
        </div>



        <!-- footer -->
        <?php include('includes/footer.php') ?>




    </div>
    <script src="static/js/script.js"></script>
</body>

</html>