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

<title>TML | Managing The Flow</title>
</head>

<body>
    <div class="container">


        <?php include('includes/nav_bar.php') ?>
        <?php include('includes/loginbar.php') ?>

        <h1>Managing The Flow</h1>

        <div class="content">

            <div class="article">

                <img src="static/images/line_waiting.avif" alt="waiting for a table" id="img" />

                <p>
                    The host position is often overlooked, very often an entry level
                    position filled with a young person. However, the fate of a Saturday
                    night could be in their hands. Do you want to leave the financial
                    success of your restaurant in their hands?
                </p>

                <p>
                    Every shift has a flow of its own, once you get on wait it is
                    essential to flip tables as fast as possible. Allowing too many tables
                    to get up and not get sat will create a detrimental wave to the
                    kitchen. The only way to accomplish this is for the whole team to work
                    as one, from the managers all the way to the bussers.
                </p>

                <p>
                    One up, One down are words to live by in this situation. It is
                    imperative as one table gets up, it gets cleaned, reset and sat again
                    as quickly as possible. That flow will keep the whole team on an even
                    keel. A smooth shift is one where no one area gets impacted. If you
                    allow too many tables to get up and then you sit them all at once
                    it'll create a bubble. You can literally follow the bubble throughout
                    the restaurant. For example it will start at the host stand. Guests
                    waiting will see a bunch of tables and get angry and push back at the
                    host stand and the bussers will be overwhelmed. Next once all the
                    tables are sat the servers will be overwhelmed. Any good server who is
                    double or triple sat will take all the tables orders at once. Then the
                    bubble will move to the kitchen. The Fry station and/or any station in
                    the kitchen that is heavy on app items will get hit first. Then the
                    rest of the kitchen will be impacted. Next the Expo and food runners
                    will be very busy. Then a low will develop until a bunch of tables get
                    up and the cycle will repeat.
                </p>

                <p>
                    Training your hosts on the importance of one up, one down and working
                    with the bussers on cleaning and flipping tables as fast as possible
                    would be the first step. The FOH manager plays a key role. First by
                    keeping an eye on the amount of open tables during a wait any also be
                    ready to step in and help the host keep the flow correct. Some have
                    high tech systems like updatedable floor plans on iPads or radio
                    transmitters to keep the floor plan the host uses up today while some
                    just use the hosts who just sat a table come back up with the table
                    numbers that are ready to be sat. Whether you have the means for a
                    high tech or you use a low tech solution the key is speed. I can not
                    reiterate the importance of one up and one down!
                </p>

                <div id="likeLink">You need to be Logged in to Like!</div>

                <?php foreach ($posts as $post) : ?>
                <!-- id needs to same id as blog title and needs to be updated-->
                <?php if ($post->id == 1) : ?>

                <p>If you liked this blog post give it a

                    <button class="likeButton" onclick="newFunction()">Like!
                        <?php echo $post->likes; ?></button>
                </p>


                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php include('includes/footer.php') ?>

    </div>
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
            if (isset($_SESSION["user_id"])) {
                $userLoggedIn = 1;
            } else {
                $userLoggedIn = 0;
            } ?>

        let user = <?php echo $userLoggedIn ?>;

        if (user == 1) {
            window.location.href = "like.php?id=1";
        } else {
            toastPopup();
        }
    }
    </script>


    <script src="static/js/script.js"></script>
</body>

</html>