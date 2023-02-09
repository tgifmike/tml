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

<title>TML | Point of Sale Menu Programming</title>
</head>

<body>

    <?php include('includes/nav_bar.php') ?>
    <?php include('includes/loginbar.php') ?>



    <div class="content">


        <h1>Point of Sale Menu Programming</h1>

        <div class="article">

            <img src="static/images/pos.jpg" alt="Point of Sale" id="img" />

            <p>
                After you have chosen your point of sales system for your location the next most important task is
                programming your menu. A well programmed menu will shorten the time your servers and bartenders spend at
                the computer which will put them in front of customers which is where they belong. An important resource
                is your staff, use their knowledge and experience to guide you..</p>

            <p>
                Let's start with the basics of a POS menu. First you have items, these are the actual menu items. Next
                each item should have modifiers. Modifiers are choices, they could be how a steak is cooked or the
                choice of dressing on a salad. Then there are ingredients, these are the choices that make up the
                modifiers. You can attach a price to the ingredients to make sure you don't lose money with upcharges.
                Some POS’s can also add more money if you add an adjective such as Heavy or Extra. Modifiers can be
                mandatory or not. The way in which the modifiers are implemented are the meat and potatoes of the menu
                programming. If the Modifiers are not done correctly the servers will use the special instruction part
                of the POS. This should be avoided at all costs. First typing in what the customer wants is time
                consuming, valuable time that is wasted during a rush.
            </p>

            <p>
                There are two main schools of thought on menu programming. The first is how most POS resellers program a
                menu, they take a group of items and program them together. For example, they would take all your
                appetizers, find all the modifiers that pertain to all of the items in that group and make them all
                available. This is the quick and easy way to make a menu. A better way is to program each item on its
                own. Even if it takes longer to program a menu this way it will be accurate for each item. Each item
                will have only the modifiers it should have. In the long run I believe the more time spent on the front
                end of the menu programming will pay off dividends.
            </p>

            <p>
                When Programming a menu, the more time spent in the beginning will deliver you a better product. The
                goal of the POS is to give your servers more time with customers not with the POS. The smallest amount
                of touches that allow servers to order exactly what the customer wants and for the restaurant owner to
                account for any and all charges. When you are happy with what you came up with just stop. Once the
                servers and bartenders start using the POS muscle memory starts to build. A seasoned server can almost
                punch in an order without looking. So when you are done stop messing with the menu until you have a new
                menu rolled out.

            </p>





            <div id="likeLink">You need to be Logged in to Like!</div>

            <?php foreach ($posts as $post) : ?>
            <!-- id needs to same id as blog title and needs to be updated-->
            <?php if ($post->id == 11) : ?>

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