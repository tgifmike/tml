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

<title>TML | Theoretical Food Cost</title>
</head>

<body>

    <?php include('includes/nav_bar.php') ?>
    <?php include('includes/loginbar.php') ?>



    <div class="content">


        <h1>Theoretical Food Cost</h1>

        <div class="article">

            <img src="static/images/food_cost.jpg" alt="waiting for a table" id="img" />

            <p>
                Lets start with definitions. Theoretical food cost is what your restaurant food costs should be
                according to the current cost of all ingredients. Theoretical food costs assume zero waste, that
                each recipe was followed precisely, and with no shrinkage of ingredients. The actual food cost is
                the real cost of all the food that a restaurant purchased.. The actual food cost takes in account
                spoilage, recipe deviations and waste.

            </p>

            <p>
                Back in the day there was no talk about theoretical cost, there was only actual cost. There is a
                simple formula. Beginning Inventory + Purchases - Ending Inventory / Food Sales = Food Cost.
                Although technically its the actual food cost. However, it is not the best way to look at food cost.
                Solely looking at the actual food cost does not take in account factors like inflation or product
                mix. If Restaurant A sold a lot of expensive steaks and had little waste but Restaurant B sold a lot
                of low cost chicken dishes and had high waste which Restaurant would have a higher actual food cost.
                Restaurant A would have a higher cost even with less waste because Restaurant A’s product mix
                consisted of higher cost items. Most people find this hard to grasp and do not like having the
                higher cost but in fact the higher cost comes from higher sales from the expensive products which in
                turn will lead to higher profits.

            </p>

            <p>
                Now what is a better way to gain a line of sight on how much money your loosing? Actual vs.
                theoretical food cost is a great way. No one is ever perfect, so actual food cost should never match
                the theoretical. The goal is to get as close as possible. If the variance between theoretical and
                actual is big, there is waste. Having the report broken down by category will help indicate where
                the issues are. Any variation translates into loss profits.
            </p>

            <p>
                Don't get caught up with the actual food cost percentage, but pay close attention to the variance of
                Actual vs. theoretical food cost. This represents the amount of money being inefficiently wasted in
                food costs and missing from the restaurant’s bottom line.
            </p>



            <div id="likeLink">You need to be Logged in to Like!</div>

            <?php foreach ($posts as $post) : ?>
            <!-- id needs to same id as blog title and needs to be updated-->
            <?php if ($post->id == 3) : ?>

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