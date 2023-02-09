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



<title>TML | Sheet to Shelf
</title>
</head>

<body>
    <div class="container">


        <?php include('includes/nav_bar.php') ?>
        <?php include('includes/loginbar.php') ?>



        <div class="content">


            <h1>Sheet to shelf Organization</h1>

            <div class="article">

                <img src="static/images/taking_inv.jpg" alt="taking inventory" id="img" />

                <p>
                    Successful managers set up their count sheets using the sheet-to-shelf method. First organize all
                    your racks and storage locations. The shelves should be organized from left to right and top to
                    bottom. Then match the layout to your inventory and order sheets in the same order. You also have to
                    match your order and inventory layout to the computer application used for ordering and inventory.
                    Not only will this save you time but it will make your orders and inventory more accurate. Using the
                    shelf-to-sheet method will allow you to look at what’s on the shelf and match it to what’s on your
                    inventory sheet. Systematically facilitate counting quickly and accurately.
                </p>

                <p>
                    Start your inventory counts by making sure the freezer, the walk-in, the dry storage, etc. are
                    arranged properly. Items on the shelf should be faced forward with labels facing out and open cases
                    should be removed from the box. Removing box tops to make counting bagged products easier to count.
                    This ensures a full case is counted as a full case, with no items missed. This can be accomplished
                    by a closing duty done every night but its especially important to be done correctly the night
                    before count or order.
                </p>

                <p>
                    The way I used to set up my sheets was first to input all the items I was ordering on an excel
                    sheet. I would reserve the far left column for a location number. Depending on how many items are in
                    each location you can follow the same systems. The first pass is started with just locations. For
                    example all the Freezer items would be 100, then all the dry storage items would be 200 and so on
                    until you get through all your storage locations. Then I would sort the list by using the sort
                    feature in excel; this will put all the location items together. Next I would refine my list by
                    storage area. I would start with the leftmost rack in the first storage area and then start on the
                    top shelf on that rack and with the leftmost item. That item would be 101, the next item would be
                    102 and so on. When you are done with all the items on that rack you move onto the next rack. Then
                    you sort the sheet again. Now all the items should be in sheet to shelf order.
                </p>

                <p>
                    Sloppy inventory/ordering sheets will increase the chances of having write-ins on your order sheets.
                    Write-ins reflect the items on the shelves that aren’t on your inventory taking sheet. They could
                    also be the items that have dropped off the inventory sheet for one reason or another. A lot of the
                    time, they’re the newly purchased items that haven’t been added to your inventory taking sheets.
                </p>

                <p>
                    Make your restaurant's product counts easier, more efficient, and more accurate, by using the
                    shelf-to-sheet method. It will streamline the process, eliminate the guesswork, and make sure it is
                    consistent and accurate every single time. Just maybe you won't waste time chasing down products
                    that you forgot to order.
                </p>

                <div id="likeLink">You need to be Logged in to Like!</div>

                <?php foreach ($posts as $post) : ?>
                <!-- id needs to same id as blog title and needs to be updated-->
                <?php if ($post->id == 2) : ?>

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
        if (user === 1) {
            window.location.href = "like.php?id=2";
        } else {
            toastPopup();
        }
    }
    </script>


    <script src="static/js/script.js"></script>
</body>

</html>