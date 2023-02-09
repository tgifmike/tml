<?php
/* * * * * * * * * * * * * * *
* Returns all published posts
* * * * * * * * * * * * * * */


function getPublishedPosts()
{
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn, $sql);

    // fetch all posts as an associative array called $posts
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $posts;
}


function getRandomPosts()
{
    global $conn;
    $sql = "SELECT * FROM posts order by Rand() limit 3";
    $result = mysqli_query($conn, $sql);
    $randomPosts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $randomPosts;
}

function getSalesPosts()
{
    global $conn;
    $sql = "SELECT * FROM posts WHERE (category = 'sales')";
    $result = mysqli_query($conn, $sql);
    $getSalesPosts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $getSalesPosts;
}
function getCostPosts()
{
    global $conn;
    $sql = "SELECT * FROM posts WHERE (category = 'labor')";
    $result = mysqli_query($conn, $sql);
    $getLaborPosts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $getLaborPosts;
}
function getProfitPosts()
{
    global $conn;
    $sql = "SELECT * FROM posts WHERE (category = 'profit')";
    $result = mysqli_query($conn, $sql);
    $getProfitPosts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $getProfitPosts;
}
function showLikes()
{
    global $conn;
    $sql = ("SELECT 
                posts.id, 
                posts.title,
                COUNT(post_likes.id) AS likes
                
                FROM posts
                
                LEFT JOIN post_likes
                ON posts.id = post_likes.post

                GROUP BY posts.id

                    
    ");

    $result = mysqli_query($conn, $sql);
    $showLikes = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // while ($row = $sql->fetch_object()) {
    //     $showLikes[] = $row;
    // }

    return $showLikes;
}
