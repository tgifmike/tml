<?php

require_once('config.php');
require_once('includes/head_section.php');

if (isset($_GET['id'])) {

    $id = (int)$_GET['id'];

    //echo 'OK!';

    $conn->query("INSERT INTO post_likes (user, post)
             SELECT {$_SESSION["user_id"]}, {$id}
             FROM posts
             WHERE EXISTS (
                 SELECT id
                 FROM posts
                 WHERE id = {$id})
             AND NOT EXISTS (
                 SELECT id
                 FROM post_likes
                 WHERE user = {$_SESSION["user_id"]}
                 AND post = {$id})
             LIMIT 1");
}

header('Location: index.php');