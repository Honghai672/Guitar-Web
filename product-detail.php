<?php
include('header.php');
?>
    <!-- ====  PRODUCT DETAIL ==== -->   
    
    <div class="container mt-4 ">
        <div class="row">
            <div class="col-12">
                <?php
                if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sqlDetail = "SELECT * FROM tbl_product WHERE id = ".$id;
                $resultRow = mysqli_query($conn, $sqlDetail);
                $row = mysqli_fetch_row($resultRow);
                // echo "<pre>";
                // print_r($row);
                // die;


                ?>
                <div class="container">
                    <div class="row product__detail-images">
                        <div class="col-md-4 col-sm-12">
                            <div class="product__info-img">
                                <img src="admin/uploads/product/<?php echo $row['9']  ?>" width="70%" alt="">
                            </div>
                        </div>

                        <div class="col-6">
                            <h4 style="font-weight:bolder ;"><?php echo $row['2'] ?></h4>
                            <strong>Giá : <?php echo number_format($row['5'],0,",","."); ?> VNĐ</strong>

                            <p class="sl mt-2" >
                                <strong>Số lượng :</strong>
                                <input type="number" name="quantitys" value="1" min="1" id="num" name="num">
                            </p>

                            <button class="btn-success" onclick="addCart(<?php echo $row[0]; ?>)">add to cart</button>

                            <h5><strong>Mô tả sản phẩm : </strong></h5>
                            <p style="font-size:16px ;"><?php echo $row['3'] ?></p>
                        </div>
                    </div>

                    <div class="row product__detail-desc">
                        <h2>Chi tiết sản phẩm</h2>
                        <p style="font-size:16px;"><?php echo $row['4'] ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php
        }else{
            echo "<h1>khong thay</h1>";
        }
    ?>
    
    <?php
    include('other.php');
    ?>

    <?php
    include('footer.php');  
    ?>
