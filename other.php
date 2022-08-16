

  <div class="container">
  <div class="row mt-4 mb-5">
    <?php 
            //other product
            $sqlOther = "SELECT * FROM tbl_product WHERE category_id = $row[1] ORDER BY RAND() LIMIT 6 ";
            $resultOther = mysqli_query($conn, $sqlOther);   
            while ($rowOther = mysqli_fetch_assoc($resultOther)){
    ?>  
        <div class="col-md-2 col-sm-6 d-flex justify-content-center">
            <div class="card " style="width: 15rem;">
                <img src="admin/uploads/product/<?php echo $rowOther['image']  ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="product-detail.php?id=<?php echo $rowOther['id'] ?>" style="text-decoration:none ;color:black;"><h5 style="font-weight:bold" class="card-title"><?php echo $rowOther['name'] ?></h5></a>
                    <p class="card-text"><?php echo $rowOther['small_description'] ?></p>
                </div>
            </div>
        </div>
        

    
    <?php 
        }
    ?>
    </div>
  </div>
