<?php
include('admin/config/dbcon.php');
include('header.php')
?>

    <div class="container mt-5">
        <div class="row">
            <div class="product__featured">
                <h4>SẢN PHẨM </h4>
            </div>
        </div>
        <?php
            $item_per_page = 12;
            $current_page = 1;
            $offset = ($current_page - 1 ) *  $item_per_page;
            $sql_product_page = mysqli_query($conn, "SELECT * FROM tbl_product ORDER BY id ASC LIMIT ".$item_per_page." OFFSET ".$offset);
            $totalRecords = mysqli_query($conn, "SELECT * FROM tbl_product");
            $totalRecords = $totalRecords->num_rows;
            $totalPages = ceil($totalRecords / $item_per_page);

        ?>
        <div class="row product__section"> 
            <?php 
                while($row_product = mysqli_fetch_array($sql_product_page)){
            ?>
            <div class="col-md-2 col-sm-6 product ">
                <div class="product__card">
                    <div class="product__item">
                        <div class="product__images">
                            <a href="product-detail.php?id=<?php echo $row_product['id'] ?>"><img src="admin/uploads/product/<?php echo $row_product['image']  ?>" alt=""></a>
                        </div>
            
                        <div class="product__detail">
                            <h5><a href="product-detail.php?id=<?php echo $row_product['id'] ?> "><?php echo $row_product['name'] ?> </a></h5>
                            <p>còn hàng</p>
                            <strong><?php echo number_format($row_product['price'],0,",","."); ?> VNĐ</strong>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php
            include('page.php') ;
            ?>
        </div> 
    </div>

<?php 
include('footer.php')
?>