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
                            <h4>Product Add
                            <a href="product.php" class="btn btn-danger btn-sm float-right">back</a>
                            </h4>
                            
                        </div>

                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Chọn danh mục</label>
                                        <?php
                                            $query = "SELECT * FROM tbl_category";
                                            $query_run = mysqli_query($conn, $query);
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                
                                                    ?>
                                                    <select name="category_id" class="form-control">
                                                        <?php
                                                        foreach($query_run as $item){ ?>
                                                            <option value="<?= $item['id'] ?> "> <?= $item['name'] ?></option>
                                                        
                                                        <?php } ?>
                                                    </select>
                                                    <?php
                                                
                                            }
                                        ?>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label >Product name</label>
                                                <input type="text" name="name" class="form-control" required placeholder="Điền tên sản phẩm">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>small description</label>
                                                <textarea name="small_description" class="form-control" required rows="3" placeholder="Điền mô tả nhỏ"></textarea>
                                            </div>
                                    </div>

                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label>long description</label>
                                                <textarea name="long_description" class="form-control" required rows="3" placeholder="Điền mô tả lớn"></textarea>
                                            </div>
                                    </div>

                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Price</label>
                                                <input type="text" name="price" class="form-control" required placeholder="Điền giá sản phẩm">
                                            </div>
                                    </div>


                                    <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Offer Price</label>
                                                <input type="text" name="offerprice" class="form-control" required placeholder="Điền giá khuyến mãi sản phẩm">
                                            </div>
                                    </div>

                                    
                                    <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Tax</label>
                                                <input type="text" name="tax" class="form-control" required placeholder="Điền TAX">
                                            </div>
                                    </div>

                                    <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">quantity</label>
                                                <input type="text" name="quantity" class="form-control" required placeholder="Điền số lượng">
                                            </div>
                                    </div>

                                    <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">status (checked = show | hide)</label>
                                                <input type="checkbox" name="status" class="form-control">
                                            </div>
                                    </div>

                                    <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">Upload img</label>
                                                <input type="file" name="image" class="form-control" required >
                                            </div>
                                    </div>

                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">click to save</label></br>
                                                <button type="submit" name="product_save" class="btn btn-success btn-block">Save</button>
                                            </div>
                                    </div>
                                </div>
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
