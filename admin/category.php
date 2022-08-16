<?php

include('auth.php');

include('config/dbcon.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>


<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Danh Mục</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

    <form action="code.php" method="POST">
        <div class="modal-body">
            <div class="form-group">
                <label for="">Category</label>
                <input type="text" name="name" class="form-control" placeholder="Tên danh mục" required>
            </div>

            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea name="description" class="form-control" required rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="">trending</label>
                <input type="checkbox" name="trending" > Trending
            </div>

            <div class="form-group">
                <label for="">status</label>
                <input type="checkbox" name="status" > status
            </div>
            
        </div>

        <div class="modal-footer">
            <button type="submit" name="category_save" class="btn btn-primary btn-sm">Thêm</button>
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
        </div>
    </form>
    </div>
  </div>
</div>



<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    include('message.php');
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Category
                            <a href="" type="button" data-bs-toggle="modal" data-bs-target="#categoryModal" class="btn btn-info btn-sm float-right">Thêm</a>
                            </h4>
                            
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>tên category</th>
                                        <th>trending</th>
                                        <th>status</th>
                                        <th>Tạo lúc</th>
                                        <th>sửa</th>
                                        <th>xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     $query ="SELECT * FROM tbl_category";
                                     $query_run = mysqli_query($conn, $query);

                                     if(mysqli_num_rows($query_run) > 0)
                                     {
                                        foreach($query_run as $cateitem)
                                        {
                                            // 
                                            ?>
                                            <tr>
                                                <td><?= $cateitem['id']; ?></td>
                                                <td><?= $cateitem['name'];  ?></td>

                                                <td>
                                                    <input type="checkbox"<?= $cateitem['trending'] == '1' ? 'checked':''  ?> readonly />
                                                </td>
                                                
                                                <td>
                                                    <input type="checkbox"<?= $cateitem['status'] == '1' ? 'checked':''  ?> readonly />
                                                </td>
                                                <td><?= $cateitem['created_at']  ?></td>

                                                <td>
                                                    <a href="category-edit.php?id=<?= $cateitem['id']; ?>" class="btn btn-sm btn-info">sửa</a>
                                                </td>
                                                <td>
                                                    <form action="code.php" method="POST">
                                                        <input type="hidden" name="cate_delete_id" value="<?= $cateitem['id'];?>">
                                                        <button type="submit" name="cate_delete_btn" class="btn btn-sm btn-danger">Xóa</button>
                                                    </form>
                                                </td>
                                    </tr>
                                            <?php
                                        }
                                     }
                                     else
                                     {
                                        ?>
                                            <tr>
                                                <td colspan="6">No record found</td>
                                            </tr>
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
    </section>
</div>



<?php include('includes/script.php');?>
<?php include('includes/footer.php');?>
