<?php

include('auth.php');

include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>

<div class="content-wrapper">

    <!-- Modal -->
<div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="code.php" method="POST">
      <div class="modal-body">
        <div class="form-group">
            <label for="">Tên</label>
            <input type="text" name="name" class="form-control" placeholder="Tên" required>
        </div>

        <div class="form-group">
            <label for="">Điện thoại</label>
            <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" required>
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <span class="email_error text-danger ml-2"></span>
            <input type="email" name="email" class="form-control email_id" placeholder="Email" required>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">mật khẩu</label>
                    <input type="password" name="password" class="form-control" placeholder="mật khẩu" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Nhập lại mật khẩu</label>
                    <input type="password" name="confirmpassword" class="form-control" placeholder="Nhập lại mật khẩu" required>
                </div>
            </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="addUser" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- delete user -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
          <input type="hidden" name="delete_id" class="delete_user_id">
          <p>
              bạn có chắc xóa dữ liệu này không ?
          </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="submit" name="deleteUserbtn" class="btn btn-primary">Xóa</button>
      </div>
      </form>
    </div>
  </div>
</div>



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Register</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php 

                    if(isset($_SESSION['status']))
                    {
                        echo "<h4>".$_SESSION['status']."</h4>";
                        unset($_SESSION['status']);
                    }

                ?>
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Đăng ký
                    </h3>

                    <a href="" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right" >thêm User</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Điện thoại</th>
                        <!-- <th>Role</th> -->
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM tbl_users";
                            $query_run = mysqli_query($conn, $query);


                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                            <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['phone'] ?></td>

                                                <td>
                                                    <a href="register_edit.php?user_id=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">Sửa</a>
                                                    <span>/</span>
                                                    <button type="button" value="<?php echo $row['id'] ?>" class="btn btn-danger btn-sm deletebtn">xóa</button>
                                                </td>

                                            </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <td>Không có bản ghi nào</td>
                                <?php
                            }
                        ?>

                    </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>

<?php include('includes/script.php');?>

<script>
    $( document ).ready(function() {
        $('.email_id').keyup(function (e) {
            var email = $('.email_id').val();
            
            $.ajax({
                type:"POST",
                url:"code.php",
                data:{
                    'check_Emailbtn':1,
                    'email':email,
                },
                success: function(response) {
                    $('.email_error').text(response);
                }
            });
        }) ;
    });


</script>

<script>
    $( document ).ready(function() {
        $('.deletebtn').click(function (e) {
            e.preventDefault();

            var user_id = $(this).val();
            // console.log(user_id);
            $('.delete_user_id').val(user_id);
            $('#DeleteModal').modal('show');


        }) ;
    });
</script>

<?php include('includes/footer.php');?>