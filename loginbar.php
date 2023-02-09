<div class="loginbar" id="loginbar">

    <?php if (isset($_SESSION["user"])) : ?>


    <p>Welcome, <?php echo ($_SESSION["user"]) ?> </p>



    <?php endif; ?>



</div>