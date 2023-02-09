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

<title>TML | Online Ordering</title>
</head>

<body>

    <?php include('includes/nav_bar.php') ?>
    <?php include('includes/loginbar.php') ?>



    <div class="content">


        <h1>Online Ordering</h1>

        <div class="article">

            <img src="static/images/olo.jpg" alt="Online Ordering" id="img" />

            <p>
                Covid-19 changed the world in many ways. It drastically changed the landscape of restaurants. More and
                more people are ordering online to get delivery or just to quickly pick up an order. If you don’t have a
                good Online Orders solution you are losing money. Even if you do have a solution you could still be
                losing money.</p>

            <p>
                Online ordering has been making steady strides in popularity in the years leading up to Covid-19 but
                since then it has dramatically accelerated the trend. OLO (Online Ordering) is no longer just a trend.
                There are many solutions out there but be careful because not all solutions are equal.

            </p>

            <p>
                One solution is using 3rd party services. Let's start with the bad, these services come with
                commissions. The commissions depend on the service and sometimes in the service the rate changes
                depending on the exposure you want. For example if you want to be on the top of the list of restaurants
                the rate is higher. Another question to ask is whether this 3rd party solution is integrated or not.
                Integrated solutions flow directly into the POS, the non integrated ones send an email or fax to the
                restaurant with the order. This approach can lead to missed orders and/or costly mistakes when someone
                has to manually enter the order into the POS. It's not all gloom and doom, some restaurateurs simply
                raise their prices on the online service to offset the commissions. There is a business decision to be
                made with these services. You have to take a long hard look at the sales being brought in solely from
                the service. If it makes business sense use the service.
            </p>

            <p>
                3rd party services are not the only solution. Most POS’s have the ability to take OLO orders. This is
                the most cost effect solution but you don't get any marketing or advertising that those services
                provide. The built in OLO features in the POS are integrated into service. Meaning when someone orders
                online the order will flow directly to the kitchen just like some order a dine in order. With some in
                house marketing I have seen some a lot of success using the built in OLO from the POS. Including
                pictures and descriptions help to increase online sales.

            </p>

            <p>
                At the end of the day one thing is clear, if you don’t have OLO you should get moving on it ASAP. As for
                which option is best for you depends on your current needs.
            </p>



            <div id="likeLink">You need to be Logged in to Like!</div>

            <?php foreach ($posts as $post) : ?>
            <!-- id needs to same id as blog title and needs to be updated-->
            <?php if ($post->id == 10) : ?>

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