<?php
session_start();
include('admin/config/dbcon.php');
include('header.php');
?>

<section class="h-100 gradient-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0" style="text-transform:capitalize ;"><strong>
            Giỏ hàng của bạn
            </strong></h5>
          </div>
          
          <div class="card-body"  id="listCart">
            <?php
            $subtotal = 0;
            $total = 0;
            if(isset($_SESSION["cart"])){
                foreach ($_SESSION["cart"] as $key => $value){
            ?>
            <div class="row"  id="cartx">
              <div class="col-lg-3 col-md-12 mb-4 mb-lg-0" >
                <!-- Image -->
                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                  <img src="admin/uploads/product/<?php echo $value['image'] ?>"
                    class="w-50" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                  </a>
                </div>
                <!-- Image -->
              </div>

              <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                <!-- Data -->
                <p><strong><?php echo $value['name'] ?></strong></p>

                  <a href="javascript:void(0)" onclick="deleteCart(<?php echo $key ?>)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                <!-- Data -->
              </div>

              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <!-- Quantity -->
                <div class="d-flex mb-4" style="max-width: 300px">

                  <div class="form-outline">
                    <input onchange="updateCart(<?php echo $key ?>)" id="quantity_<?php echo $key ?>" name="quantity_" min="1"  value="<?php echo $value['num'] ?>" type="number" class="form-control" />
                    <!-- <label class="form-label" for="form1">Quantity</label> -->
                  </div>

                </div>

                <p class="text-start text-md-center">
                  <strong><?php echo number_format($total = $value['price']*$value['num'],0,",",".");$subtotal += $total; ?> VNĐ</strong>
                </p>
                <!-- Price -->
              </div>

            </div>
            <?php 
                }}else{
                    echo "<strong>Không có sản phẩm nào !</strong>";
                }
            ?>
            <!-- Single item -->
          </div>
        </div>

      </div>
      
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">hóa đơn</h5>
          </div>
          <div class="card-body">
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Tổng tiền</strong>
                </div>
                <span><strong><?php echo number_format($subtotal,0,",",".")?> VNĐ</strong></span>
              </li>
            </ul>

            <button type="button" class="btn btn-primary btn-lg btn-block">
              Thanh toán
            </button>

            <a href="index.php" style="text-decoration:none;color:black;">
                <button class="btn btn-success btn-lg btn-block">
                Trở về
                </button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include('footer.php') ?>
