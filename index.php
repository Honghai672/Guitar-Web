<?php
include('header.php');
include('slider.php');
?>


    <!-- brand -->

    <section class="brand">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brand__tittle">
                        <h4>Tìm theo thương hiệu</h4>
                        <span class="brand__tittle-border"></span>
                        <span class="brand__tittle-link"><a href="">Xem theo thương hiệu A-Z</a></span>
                    </div>

                    <div class="brand__item">
                        <a href="">
                            <img src="images/brand-1.webp" alt="">
                        </a>
                        <a href="">
                            <img src="images/brand-2.webp" alt="">
                        </a>
                        <a href="">
                            <img src="images/brand-3.webp" alt="">
                        </a>
                        <a href="">
                            <img src="images/brand-4.webp" alt="">
                        </a>
                        <a href="">
                            <img src="images/brand-1.webp" alt="">
                        </a>
                        <a href="">
                            <img src="images/brand-2.webp" alt="">
                        </a>
                        <a href="">
                            <img src="images/brand-3.webp" alt="">
                        </a>
                        <a href="">
                            <img src="images/brand-4.webp" alt="">
                        </a>

                    </div>

                    <div class="brand__logo">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 brand__logo-item">
                                    <i class="fa-solid fa-comments"></i>
                                    <span>
                                        <h5>hỗ trợ nhiệt tình</h5>
                                        <p>luôn giúp bạn có lựa <br> chọn thích hợp</p>
                                    </span>
                                </div>
                                
                                <div class="col-md-3 col-sm-6 brand__logo-item">
                                <i class="fa-solid fa-business-time"></i>
                                    <span>
                                        <h5>Thanh toán đảm bảo</h5>
                                        <p>Mua hàng trực tuyến dễ <br> dàng, nhanh chóng</p>
                                    </span>
                                </div>
        
                                <div class="col-md-3 col-sm-6 brand__logo-item">
                                <i class="fa-solid fa-handshake-angle"></i>
                                    <span>
                                        <h5>Giao hàng uy tín</h5>
                                        <p>Gói hàng cẩn thận, giao <br> hàng tận tay</p>
                                    </span>
                                </div>
        
                                <div class="col-md-3 col-sm-6 brand__logo-item">
                                    <i class="fa-solid fa-truck"></i>
                                    <span>
                                        <h5>Miễn phí giao hàng</h5>
                                        <p>Tất cả đơn hàng trên <br>100.000đ</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- brand end -->

    <!-- product -->
    <div class="container">
        <div class="row">
            <div class="product__featured">
                <h4>SẢN PHẨM BÁN CHẠY</h4>
            </div>
        </div>
        <?php
            $sql_product_home = mysqli_query($conn, "SELECT * FROM tbl_product ORDER BY id ASC LIMIT 5");

        ?>
        <div class="row product__section"> 
            <?php 
                while($row_product = mysqli_fetch_array($sql_product_home)){
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
            
        </div> 
    </div>

    
    <!-- product-end -->

    <!-- news product -->

    <section class="new">
        <div class="container mt-3">
            <div class="row">
                <div class="brand__tittle">
                    <h4>hàng mới về</h4>
                    <span class="brand__tittle-border"></span>
                    <span class="brand__tittle-link"><a href="">Xem tất cả sản phẩm mới</a></span>
                </div>
            </div>
        </div>
    </section>
    <?php
            $sql_product_home = mysqli_query($conn, "SELECT * FROM tbl_product ORDER BY id DESC LIMIT 5");

    ?>
    <div class="container">
        <div class="row product__section"> 
        <div class="row product__section"> 
            <?php 
                while($row_product = mysqli_fetch_array($sql_product_home)){
            ?>
            <div class="col-md-2 col-sm-6 product ">
                <div class="product__card">
                    <div class="product__item">
                        <div class="product__images">
                            <a href="product-detail.php?id=<?php echo $row_product['id'] ?>"><img src="admin/uploads/product/<?php echo $row_product['image']  ?>" alt=""></a>
                        </div>
            
                        <div class="product__detail">
                            <h5><a href="product-detail.php?id=<?php echo $row_product['id'] ?>"><?php echo $row_product['name'] ?> </a></h5>
                            <p>còn hàng</p>
                            <strong><?php echo number_format($row_product['price'],0,",","."); ?> VNĐ</strong>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div> 
    </div>
    </div>

    
    <!-- images banner -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="banner__item">
                    <a href=""><img src="images/banner-1.webp" alt=""></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="banner__item">
                    <a href=""><img src="images/banner-2.webp" alt=""></a>
                </div>
            </div>
        </div>
    </div>

    <!-- end -->

    <!-- ---news----- -->

        <div class="container-fluid news ">
            <div class="row">
                <div class="col-md-4 col-sm-12 ">
                    <div class="card news__info" style="width: 25rem;">
                        <img src="images/news-1.jpg" class="card-img-top" alt="...">
                        <div class="card-body news__info-detail">
                          <h5>
                            <a href="" class="card-title news__info-tittle">Cẩm nang về guitar hollowbody và semi hollow body</a>
                          </h5>
                          <p class="card-text news__info-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>

                <div class="col-md-4 col-sm-12 ">
                    <div class="card news__info" style="width: 25rem;">
                        <img src="images/new-2.jpg" class="card-img-top" alt="...">
                        <div class="card-body news__info-detail">
                            <h5>
                                <a href="" class="card-title news__info-tittle">Cẩm nang về guitar hollowbody và semi hollow body</a>
                              </h5>
                          <p class="card-text news__info-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>

                <div class="col-md-4 col-sm-12 ">
                    <div class="card news__info" style="width: 25rem;">
                        <img src="images/news-1.jpg" class="card-img-top" alt="...">
                        <div class="card-body news__info-detail">
                            <h5>
                                <a href="" class="card-title news__info-tittle">Cẩm nang về guitar hollowbody và semi hollow body</a>
                              </h5>
                          <p class="card-text news__info-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>

                
            </div>
        </div>
    <!-- --news end--- -->

<?php
include('footer.php');  
?>

   