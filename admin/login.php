<?php
session_start();
include('includes/header.php');
if(isset($_SESSION['auth']))
{
  $_SESSION['status'] = "Bạn đã đăng nhập rồi ! ";
  header('Location: index.php');
  exit(0);

}
?>

<div class="container mt-3">
<div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Đăng Nhập</p>
        <?php
          if(isset($_SESSION['auth_status']))
          {
              ?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Hey !</strong> <?php echo $_SESSION['auth_status']; ?>
                      <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
              <?php
              unset($_SESSION['auth_status']);
          }
        ?>
      <?php include('message.php'); ?>

      <form action="logincode.php" method="POST">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Nhớ thông tin
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login_btn" class="btn btn-info btn-block">Đăng nhập</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
</div>
</div>


<?php include('includes/script.php');?>
<?php include('includes/footer.php');?>
