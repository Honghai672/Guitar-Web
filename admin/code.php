<?php
include('auth.php');
include('config/dbcon.php');

if(isset($_POST['prod_delete_btn'])){
    $prod_id = $_POST['prod_delete_id'];
    $query = "DELETE FROM tbl_product WHERE id='$prod_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "xóa thành công !";
        header("Location: product.php");
    }
    else
    {
        $_SESSION['status'] = "xóa thất bại";
        header("Location: product.php");
    }

}

if(isset($_POST['product_update']))
{
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $small_description = $_POST['small_description'];
    $long_description = $_POST['long_description'];
    $price = $_POST['price'];
    $offerprice = $_POST['offerprice'];
    $tax = $_POST['tax'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'] == true ? '1':'0';

    $image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($image != '')
    {
        $update_filename = $_FILES['image']['name'];

        $allowed_extension = array('png','jpg','jpeg','webp');
        $file_extension = pathinfo($update_filename, PATHINFO_EXTENSION);
    
        $filename = time().'.'.$file_extension;
        if(!in_array($file_extension, $allowed_extension))
        {
            $_SESSION['status'] = "you are allow with only jpg ,png ,jpeg,webp image";
            header('Location: product-add.php');
            exit(0);
        }

    }
    else
    {
        $update_filename = $old_image;
    }
    
    $query = "UPDATE tbl_product SET 
            category_id='$category_id',
            name='$name',
            small_description='$small_description',
            long_description='$long_description',
            price='$price',
            offerprice='$offerprice',
            tax='$tax',
            quantity='$quantity',
            image='$update_filename',
            status='$status' WHERE id='$product_id' ";

    $query_run = mysqli_query($conn, $query);
    
    if($query_run)
    {
        if($image != '')
        {
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/product/'.$filename);
            if(file_exists('uploads/product/'.$old_image)){
                unlink("uploads/product/".$old_image);
            }
        }
        $_SESSION['status'] = "sửa sản phẩm thành công !";
        header('Location: product.php?prod_id='.$product_id);
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "sửa sản phẩm không thành công !";
        header('Location: product-edit.php?prod_id='.$product_id);
        exit(0);
    }



}

if(isset($_POST['product_save']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $small_description = $_POST['small_description'];
    $long_description = $_POST['long_description'];
    $price = $_POST['price'];
    $offerprice = $_POST['offerprice'];
    $tax = $_POST['tax'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'] == true ? '1':'0';
    $image = $_FILES['image']['name'];


    $allowed_extension = array('png','jpg','jpeg','webp');
    $file_extension = pathinfo($image, PATHINFO_EXTENSION);

    $filename = time().'.'.$file_extension;
    if(!in_array($file_extension, $allowed_extension))
    {
        $_SESSION['status'] = "you are allow with only jpg ,png ,jpeg image";
        header('Location: product-add.php');
        exit(0);
    }
    else
    {
        $query = "INSERT INTO tbl_product (category_id,name,small_description,long_description,price,offerprice,tax,quantity,image,status)
        VALUES ('$category_id','$name','$small_description','$long_description','$price','$offerprice','$tax','$quantity','$filename','$status')";
        $query_run = mysqli_query($conn, $query);
        if($query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/product/'.$filename);
            $_SESSION['status'] = "thêm sản phẩm thành công !";
            header('Location: product-add.php');
            exit(0);
        }
        else
        {
            $_SESSION['status'] = "Khong thanh cong !";
            header('Location: product-add.php');
            exit(0);
        }
    }

}



if(isset($_POST['category_save']))
{
    $_name = $_POST['name'];
    $_description = $_POST['description'];
    $_trending = $_POST['trending'] == true ? '1':'0';
    $_status = $_POST['status'] == true ? '1':'0';

    $category_query = "INSERT INTO tbl_category (name, description, trending, status)
    VALUES ('$_name','$_description','$_trending','$_status') ";
    
    $cate_query_run = mysqli_query($conn, $category_query);
    if($cate_query_run)
    {
        $_SESSION['status'] = "Thêm thành công !";
        header("Location: category.php");
    }
    else
    {
        $_SESSION['status'] = "Thêm thất bại";
        header("Location: category.php");
    }
}

if(isset($_POST['cate_delete_btn']))
{
    $cate_id = $_POST['cate_delete_id'];
    $query = "DELETE FROM tbl_category WHERE id='$cate_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "xóa thành công !";
        header("Location: category.php");
    }
    else
    {
        $_SESSION['status'] = "xóa thất bại";
        header("Location: category.php");
    }
}


if(isset($_POST['category_update']))
{
    $cate_id = $_POST['cate_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $trending = $_POST['trending'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE tbl_category SET name='$name',description='$description',trending='$trending',status='$status' WHERE id='$cate_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "category update thành công !";
        header('Location: category.php');
    }
    else
    {
        $_SESSION['status'] = "category update không thành công !";
        header('Location: category.php');
    }
}


if(isset($_POST['logout_btn']))
{
    // session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    $_SESSION['status'] = "Đăng xuất thành công";
    header("Location: login.php");
    exit(0);
}


if(isset($_POST['check_Emailbtn']))
{
    $email = $_POST['email'];

    $checkemail = "SELECT email FROM tbl_users WHERE email='$email' ";
    $checkemail_run = mysqli_query($conn, $checkemail);

    if(mysqli_num_rows($checkemail_run) > 0)
    {
        echo "Email is already taken";
    }
    else
    {
        echo "It's avaiable";
    }
}


if(isset($_POST['addUser']))
{
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $confirmpassword = $_POST['confirmpassword'];

   if($password == $confirmpassword)
   {

    $checkemail = "SELECT email FROM tbl_users WHERE email='$email' ";
    $checkemail_run = mysqli_query($conn, $checkemail);

    if(mysqli_num_rows($checkemail_run) > 0)
    {
        //taken
        $_SESSION['status'] = "email is already taken !";
        header("Location: register.php");
        exit;
    }
    else
    {
        //avaiable
        $user_query = "INSERT INTO tbl_users (name,phone,email,password) VALUES ('$name','$phone','$email','$password')";
        $user_query_run = mysqli_query($conn, $user_query);
     
        if($user_query_run)
        {
            $_SESSION['status'] = "User added succesfully";
            header("Location: register.php");
        }
        else
        {
             $_SESSION['status'] = "User added failed";
             header("Location: register.php");
        }
        
    }


   }
   else
   {
        $_SESSION['status'] = "Password and confirm password not match";
        header("Location: register.php");
   }


}



if(isset($_POST['updateUser']))
{
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = " UPDATE tbl_users SET name='$name',phone='$phone',email='$email',password='$password' WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
   {
       $_SESSION['status'] = "User update succesfully";
       header("Location: register.php");
   }
   else
   {
        $_SESSION['status'] = "User update failed";
        header("Location: register.php");
   }
}

if(isset($_POST['deleteUserbtn']))
{
    $userid = $_POST['delete_id'];

    $query =  "DELETE FROM tbl_users WHERE id='$userid' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
        $_SESSION['status'] = "User delete succesfully";
        header("Location: register.php");
    }
    else
    {
         $_SESSION['status'] = "User delete failed";
         header("Location: register.php");
    }
}
?>
