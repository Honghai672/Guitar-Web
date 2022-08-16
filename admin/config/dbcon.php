<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tbl_admin";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);


// Check connection
if(!$conn)
{
    header("Location: ../errors/db.php");
    die();
}
mysqli_set_charset($conn, 'utf8');
?>