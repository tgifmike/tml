<div class="topNav" id="topNav">

    <div class="topNav-left">
        <a href="index.php" id="logo">TML</a>
    </div>

    <div class="topNav-right">
        <i class="fas fa-bars" id="ham-menu"></i>
        <ul id="nav-bar">



            <?php if (isset($_SESSION["user"])) : ?>


            <li style="float:right"><a href="logout.php">Log out</a></li>


            <?php else : ?>

            <li style="float:right"><a href="signup.php">Sign Up</a></li>
            <li style="float:right"><a href="login.php">Login</a></li>

            <?php endif; ?>

            <li style="float:right"><a href="all_blogs.php">Blogs</a></li>
            <li style="float:right"><a href="contact.php">Contact</a></li>
            <li style="float:right"><a href="about.php">About</a></li>
            <li style="float:right"><a href="index.php"><i class="fa fa-home" id="home"></i></a></li>


        </ul>

    </div>

</div>