<?php require_once('config.php') ?>
<?php require_once(ROOT_PATH . '/includes/functions.php') ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>

<?php
$postQuery = $conn->query("SELECT 
                posts.id, 
                posts.title,
                COUNT(post_likes.id) AS likes
                
                FROM posts
                
                LEFT JOIN post_likes
                ON posts.id = post_likes.post

                GROUP BY posts.id");

while ($row = $postQuery->fetch_object()) {
    $posts[] = $row;
}
?>

<title>TML | Leaning From A Bad Manager</title>
</head>

<body>

    <?php include('includes/nav_bar.php') ?>
    <?php include('includes/loginbar.php') ?>



    <div class="content">


        <h1>Leaning From A Bad Manager</h1>

        <div class="article">

            <img src="static/images/worldsBestBoss.jpg" alt="Manager Drinking Coffee" id="img" />

            <p>
                In my experience a bad manager is way too common a problem. Be that as it may it can still be a very
                good learning experience for someone who is cognizant of what’s going on. Sometimes you can learn more
                from a bad manager than a good manager.

            </p>

            <p>
                First, don't get frustrated! I know this task is probably an exercise in futility because there are only
                a few things more infuriating than someone who is in charge of you that doesn’t know what they are
                doing. Be mindful of your surroundings, be curious enough to look into the outcomes of issues that come
                up and be willing to keep an open mind to learn from not only your mistakes and others mistakes.

            </p>

            <p>
                One thing to keep in mind is even a broken clock is correct twice a day, so keep a close eye on your
                manager. Watch the decisions they make, there will be some interactions you see that you don't agree
                with at the moment but they work out better than you expected. Sometimes they will surprise you. The
                important part is remembering each situation and how the manager reacted and the outcome. Believe me
                history repeats itself and you will find yourself in the same or similar predicament. If you learn from
                the success as well as the failures you will come out ahead.
            </p>

            <p>
                Also keep an eye on the decisions they don't make. Marcus Tullius Cicero Once said, “More is lost by
                indecision than wrong decision. Indecision is the thief of opportunity. It will steal you blind.” Often
                a bad manager will shy away from an issue they don’t know how to deal with. However, as Cicero has so
                aptly pointed out, that will lead more often than not to a bad decision. Most of the time its best to
                act quickly and decisively. Try to let your instincts and best of all your experience guide you. There
                is nothing like experience, but unfortunately that only comes with time.
            </p>

            <p>
                Often the bad decisions or actions of a manager have a bright spot light shown on them because it is
                usually surrounded by a chaotic situation. Keep your wits about you and as long as you keep an open mind
                and learn from the mistakes of your managers you will become a better manager than they were.
            </p>



            <div id="likeLink">You need to be Logged in to Like!</div>

            <?php foreach ($posts as $post) : ?>
            <!-- id needs to same id as blog title and needs to be updated-->
            <?php if ($post->id == 9) : ?>

            <p>If you liked this blog post give it a

                <button class="likeButton" onclick="newFunction()">Like!
                    <?php echo $post->likes; ?></button>
            </p>


            <?php endif; ?>
            <?php endforeach; ?>



        </div>




    </div>
    <?php include('includes/footer.php') ?>


    <script>
    function toastPopup() {
        var x = document.getElementById("likeLink");
        x.className = "show";
        setTimeout(function() {
            x.className = x.className.replace("show", "");
        }, 3000);
    }

    function newFunction() {
        <?php
            // session_start();
            if (isset($_SESSION["user_id"])) {
                $userLoggedIn = 1;
            } else {
                $userLoggedIn = 0;
            } ?>
        let user = <?php echo $userLoggedIn ?>;
        if (user = 1) {
            window.location.href = "like.php?id=3";
        } else {
            toastPopup();
        }
    }
    </script>


    <script src="static/js/script.js"></script>
</body>

</html>