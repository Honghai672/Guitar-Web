 <footer>
        <div class="container footer__icon">
            <div class="footer__border">
                <a href="https://www.facebook.com/hai.seo.56863"><i class="fa-brands fa-facebook"></i></a>
            </div>
            <div class="footer__border">
                <a href="https://www.sweelee.com.vn/"><i class="fa-brands fa-twitter"></i></a>
            </div>
            <div class="footer__border">
                <a href="https://www.sweelee.com.vn/"><i class="fa-brands fa-instagram-square"></i></i></a>
            </div>
            <div class="footer__border">
                <a href="https://www.sweelee.com.vn/"><i class="fa-brands fa-facebook"></i></a>
            </div>

        </div>

        <div class="container footer__list">
            <div class="col-md-3 col-xs-6 footer__item ">
                <ul>
                    <li class="footer__link-tittle">thương hiệu</li>
                    <li class="footer__link"><h5><a href="">fender</a></h5></li>
                    <li class="footer__link"><h5><a href="">pRS</a></h5></li>
                    <li class="footer__link"><h5><a href="">ibanez</a></h5></li>
                    <li class="footer__link"><h5><a href="">gibson</a></h5></li>
                    <li class="footer__link"><h5><a href="">martin</a></h5></li>
                    <li class="footer__link"><h5><a href="">squier</a></h5></li>
                    <li class="footer__link-all"><h5><a href="">xem hết</a></h5></li>
                </ul>
            </div>
            <?php
            $footer_cate = mysqli_query($conn, "SELECT * FROM tbl_category ORDER BY id ASC LIMIT 5");
            ?>
            <div class="col-md-3 col-xs-6 footer__item">

                <ul>
                    <li class="footer__link-tittle">phân loại</li>
                    <?php 
                        while($row_cate = mysqli_fetch_array($footer_cate)){
                    ?>
                    <li class="footer__link"><h5><a href=""><?php echo $row_cate['name'] ?></a></h5></li>
                    
                    <?php } ?>
                </ul>

            </div>
            <div class="col-md-3 col-xs-6 footer__item">
                <ul>
                    <li class="footer__link-tittle">Thông tin chung</li>
                    <li class="footer__link"><h5><a href="">fender</a></h5></li>
                    <li class="footer__link"><h5><a href="">fender</a></h5></li>
                    <li class="footer__link"><h5><a href="">fender</a></h5></li>
                    <li class="footer__link"><h5><a href="">fender</a></h5></li>
                    <li class="footer__link"><h5><a href="">fender</a></h5></li>
                    <li class="footer__link"><h5><a href="">fender</a></h5></li>
                    <li class="footer__link-all"><h5><a href="">fender</a></h5></li>
                </ul>
            </div>
            <div class="col-md-3 col-xs-6 footer__item">
                <ul>
                    <li class="footer__link-tittle">Terms of service</li>
                    <li class="footer__link-all"><h5><a href="">xem hết</a></h5></li>
                </ul>
            </div>
        </div>

        <div class="container footer__end">
            <div class="row">
                <div class="col-5 footer__end-item">
                    <p class="footer__end-text">Bản quyền © 2022,<p><a href="#">Công ty TNHH  Swee lee</a></p></p>
                    <div class="footer__item-des">
                        <p>Giấy chứng nhận đăng ký kinh doanh số 0313059273 do Sở Kế hoạch và Đầu tư Thành phố Hồ Chí Minh cấp ngày 19/12/2014. Địa chỉ đăng ký kinh doanh: 38 đường số 5 Khu dân cư Him Lam, P. Tân Hưng, Q.7, TPHCM.</p>
                    </div>
                </div>
                <div class="col-3 footer__end-item">
                    <p>được chứng nhận bởi</p>
                    <div class="footer__end-img">
                        <img src="images/footer.png" alt="">
                        <img src="images/footer.png" alt="">
                        <img src="images/footer.png" alt="">
                    </div>
                </div>
                <div class="col-4 footer__end-item">
                    <p>hình thức thanh toán</p>
                    <div class="footer__end-img">
                        <img src="images/bank.png" alt="">
                        <img src="images/bank-1.png" alt="">
                        <img src="images/bank-1.png" alt="">
                        <img src="images/bank-1.png" alt="">
                        <img src="images/bank-1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="back-top">
        <i class="fa-solid fa-arrow-up"></i>
    </div>

 

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                if ($(this).scrollTop()) {
                    $('#back-top').fadeIn();
                }else{
                    $('#back-top').fadeOut();
                }
            });
            $('#back-top').click(function() {
                $('html,body').animate ({
                    scrollTop:0
                },50)
            }) 
        })

        function addCart(id){
            num = $("#num").val();
            $.post('addcart.php', {'id':id,'num':num},function(data){
            });
            alert('da them');
            $("#numberCart").text(data)

        }

        function updateCart(id){
            num = $("#quantity_"+id).val();
            $.post('updatecart.php', {'id':id,'num':num},function(data){
                $("#listCart").load("http://localhost/guitar_web/cart.php #cartx");
            });
        }

        function deleteCart(id){
            $.post('updatecart.php', {'id':id,'num':0},function(data){
                $("#listCart").load("http://localhost/guitar_web/cart.php #cartx");
            });
        }
    </script>


    

</body>
</html>