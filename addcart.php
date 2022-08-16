<?php
session_start();
if(isset($_POST["id"]) && isset($_POST["num"])){
    include("admin/config/dbcon.php");
    $id = $_POST["id"];
    $num = $_POST["num"];

    $sqlDetail = "SELECT * FROM tbl_product WHERE id = ".$id;
    $resultRow = mysqli_query($conn, $sqlDetail);
    $row = mysqli_fetch_row($resultRow);
    if(!isset($_SESSION["cart"])){
        $cart = array();
        $cart[$id] = array(
            'name'=>$row['2'],
            'num'=>$num,
            'price'=>$row['5'],
            'image'=>$row['9']
        );
    }else{
        $cart = $_SESSION["cart"];
        if(array_key_exists($id, $cart)){
            $cart[$id] = array(
                'name'=>$row['2'],
                'num'=>(int)$cart[$id]['num'] + $num,
                'price'=>$row['5'],
                'image'=>$row['9']
            );
        }else{
            $cart[$id] = array(
                'name'=>$row['2'],
                'num'=>$num,
                'price'=>$row['5'],
                'image'=>$row['9']
            );
        }
    }
    $_SESSION["cart"] = $cart; 
    $numCart = 0;
    foreach($_SESSION["cart"]  as $key => $value){
        $numCart ++;
    }
    echo $numCart;
}

?>