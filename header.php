<?php
include('admin/config/dbcon.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,400;1,700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>


<body>
    <header>
        <section class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <a href="index.php"><h1 class="logo">swee lee</h1></a>
                    </div>
    
                    <div class="col-6">
                        <form class="top-bar__search" action="" method="POST">
                            <input type="text" name="search_id" placeholder="Tìm kiếm sản phẩm hoặc thương hiệu" >
                            <button type="submit" class="btn btn-dark">tìm kiếm</button>
                        </form>
                    </div>
    
                    <div class="col-3">
                        <div class="top-bar__menu">
                            <ul class="top-bar__menu-list">
                                <li><h5><a href="">đăng ký</a></h5></li>
                                <li ><h5><a href="">liên hệ</a></h5></li>
                                <li ><h5><a href="">tài khoản</a></h5></li>
                                <?php
                                     $numberCart = 0;
                                     if(isset($_SESSION["cart"])){
                                        foreach($_SESSION["cart"]  as $key => $value){
                                            $numberCart ++;
                                        }
                                     } 
                                ?>
                                <li>
                                    <h5><a href="cart.php"><i class="fa-solid fa-cart-shopping"><span id="numberCart"><?php echo $numberCart;  ?></span></i></a></h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bottom-bar">
            <div class="container">
                <div class="row">
                        <ul class="bottom-bar__list">
                            <li><a href="">thương hiệu</a></li>
                            <li><a href="">bộ sưu tập</a></li>
                            <li><a href="productpage.php">sản phẩm</a></li>
                            <li><a href="info.php">thông tin chung</a></li>
                        </ul>
                </div>
            </div>
        </section>
    </header>