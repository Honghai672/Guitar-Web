<?php
include('auth.php');

include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Trang quản trị</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active">Đăng ký</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                           <strong>Chỉnh sửa người dùng</strong>
                        </h3>

                        <a href="register.php" class="btn btn-danger btn-sm float-right" >Back</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4" style="opacity:0.8 ;">
                        <img src="assets/dist/img/nathana-reboucas-SljXQgsYXtk-unsplash.jpg" class="rounded float-start" width="80%" alt="">
                    </div>
                    
                    <div class="col-md-8">
                    <form action="code.php" method="POST">
                        <div class="modal-body">
                            <?php 
                            if(isset($_GET['user_id']))
                            {
                                $user_id = $_GET['user_id'];
                                $query = "SELECT * FROM tbl_users WHERE id='$user_id' LIMIT 1";
                                $query_run = mysqli_query($conn, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                                <input type="hidden" name="user_id" value="<?php echo $row['id'] ?>">
                                                <div class="form-group">
                                                    <label for="">Tên</label>
                                                    <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Tên">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Số điện thoại</label>
                                                    <input type="text" name="phone" value="<?php echo $row['phone'] ?>" class="form-control" placeholder="Số điện thoại">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Email ID</label>
                                                    <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Email">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Mật khẩu</label>
                                                    <input type="password" name="password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="mật khẩu">
                                                </div>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "<h4>  No Record found !</h4> ";
                                }
                            }

                            ?>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="updateUser" class="btn btn-info">Cập nhập</button>
                        </div>
                        </form>
                    </div>


                </div>
            </div>
    </div>
</div>

<?php include('includes/script.php');?>
<?php include('includes/footer.php');?>
