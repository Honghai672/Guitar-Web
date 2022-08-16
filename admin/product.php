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
                            <h4>Product
                            <a href="product-add.php" class="btn btn-info btn-sm float-right">Thêm</a>
                            </h4>
                            
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>name</th>
                                        <th>Price</th>
                                        <th>status</th>
                                        <th>created_at</th>
                                        <th>delete</th>
                                        <th>edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     $query ="SELECT * FROM tbl_product";
                                     $query_run = mysqli_query($conn, $query);

                                     if(mysqli_num_rows($query_run) > 0)
                                     {
                                        foreach($query_run as $prod_item)
                                        {
                                            // 
                                            ?>
                                            <tr>
                                                <td><?= $prod_item['id']; ?></td>
                                                <td><?= $prod_item['name'];  ?></td>
                                                <td><?= $prod_item['price'];  ?></td>


                                                
                                                <td>
                                                    <input type="checkbox"<?= $prod_item['status'] == '1' ? 'checked':''  ?> readonly />
                                                </td>
                                                <td><?= $prod_item['created_at']  ?></td>

                                                <td>
                                                    <form action="code.php" method="POST">
                                                        <input type="hidden" name="prod_delete_id" value="<?= $prod_item['id']; ?>">
                                                        <button type="submit" name="prod_delete_btn" class="btn btn-sm btn-danger">Xóa</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="product-edit.php?prod_id=<?=$prod_item['id']?>" class="btn btn-sm btn-info">Sửa</a>
                                                </td>
                                    </tr>
                                            <?php
                                        }
                                     }
                                     else
                                     {
                                        ?>
                                            <tr>
                                                <td colspan="7">No record found</td>
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
