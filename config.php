<?php
$servername = "sql303.byethost5.com";
$username = "b5_32811184";
$password = "bellaSera34";
$dbname = "b5_32811184_posts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

// return $conn;




// define global constants
define('ROOT_PATH', realpath(dirname(__FILE__)));
define('BASE_URL', 'http://restmanagement.byethost5.com/');