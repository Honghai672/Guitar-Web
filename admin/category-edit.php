<?php

include('auth.php');

include('config/dbcon.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>
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
                            <h4>Sửa Category
                            <a href="category.php" type="button"  class="btn btn-danger btn-sm float-right">back</a>
                            </h4>
                            
                        </div>

                                    
                        <div class="card-body">
                        <form action="code.php" method="POST">
                            <?php
                            if(isset($_GET['id']))
                            {
                                $cate_id = $_GET['id'];
                                $query = "SELECT * FROM tbl_category WHERE id='$cate_id' ";
                                $query_run = mysqli_query($conn, $query);

                                foreach($query_run as $item) : 
                                ?>

                            <input type="hidden" name="cate_id" value="<?= $item['id']; ?>" >
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <input type="text" name="name" value="<?= $item['name']; ?>" class="form-control" placeholder="Tên danh mục" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Mô tả</label>
                                    <textarea name="description" class="form-control" required rows="3"><?= $item['description']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">trending</label>
                                    <input type="checkbox" name="trending" <?= $item['trending'] == "1" ? 'checked':''; ?>  > Trending
                                </div>

                                <div class="form-group">
                                    <label for="">status</label>
                                    <input type="checkbox" name="status" <?= $item['status'] == "1" ? 'checked':''; ?> > status
                                </div>
                                
                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="category_update" class="btn btn-info btn-sm">Cập nhập</button>
                                <a href="category.php" class="btn btn-secondary btn-sm" >Đóng</a>
                            </div>
                            
                            <?php
                            endforeach;
                            }
                            else
                            {
                                echo "no id found !";
                            }
                            
                            ?>


                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
</div>

<?php include('includes/script.php');?>
<?php include('includes/footer.php');?>
