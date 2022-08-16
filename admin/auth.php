<?php 
session_start();

if(!isset($_SESSION['auth']))
{
    $_SESSION['auth_status'] = "Bạn cần đăng nhập trước !";
    header("Location: login.php");
    exit(0);
}



?>  