<?php 
session_status() === PHP_SESSION_ACTIVE ?: session_start();
require("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include('./include/include_head.php');?>
     <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-secondary rounded justify-content-center mx-0">
                                        <!-- add user form -->
                                        <div class="col-sm-12 col-xl-8">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Edit your profile</h6>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" name="name" value=<?php echo  $_SESSION["user_name"]; ?>>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" name="email" value=<?php echo  $_SESSION["email"]; ?>>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="user_pass"value=<?php echo  $_SESSION["password"]; ?>>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="user_phone"value=<?php echo  $_SESSION["phone"]; ?>>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="user_address"value=<?php echo  $_SESSION["address"]; ?>>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                <label for="formFile" class="form-label">change your photo</label>
                                <input type="file" name="image" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
                              </div>
                                <button type="submit" class="btn btn-primary">edit</button>
                            </form>
                        </div>
                    </div>
                 </div>  
</div> 



                                    
<!-- Footer Start -->
<?php include('./include/include_footer.php');?>
<?php

 
$msg = "";

include("./config.php");


 
// If upload button is clicked ...
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // print_r ($_FILES)
    $new_name=$_POST["name"];
    $new_email=$_POST["email"];
    $new_phone=$_POST["user_phone"];
    $new_password=$_POST["user_pass"];
    $new_address=$_POST["user_address"];

    if (!empty($_FILES['image']['name'])){
    $image = $_FILES['image']['name'];
    $image =trim($image);
    // قراءة حجم الصورة
       $image_size = $_FILES['image']['size'];
    // تحديد المسار الموجودة فيه الصورة
       $image_tmp_name = $_FILES['image']['tmp_name'];
    // تحديد المسار الجديد للصورة و تذكر انه يجب انشاء مجلد جديد مشابه للاسم المختار في المسار الجديد
       $image_folder = '../images/adminpic/'.$image;
    //    if($insert_products){
    //     if($image_size < 2000000){
           move_uploaded_file($image_tmp_name, $image_folder);
    //     }
          $conn->query("UPDATE `users` SET `user_name`='$new_name',`phone`='$new_phone',`email`='$new_email',`password`='$new_password',`pic`='$image' WHERE user_id=$id");
          $_SESSION["user_name"]= $new_name;
          $_SESSION["email"]= $new_email;
          $_SESSION["phone"]= $new_phone;
          $_SESSION["password"]= $new_password;
          $_SESSION["pic"]= $image;
          $_SESSION["address"]= $new_address;
          echo "<meta http-equiv='refresh' content='0'>";

     }else {
        $id = $_SESSION["user_id"];
        $conn->query("UPDATE `users` SET `user_name`='$new_name',`phone`='$new_phone',`email`='$new_email',`password`='$new_password',`address`='$new_address' WHERE user_id = $id");
        $_SESSION["user_name"]= $_POST["name"];
        $_SESSION["address"]= $new_address;
        $_SESSION["email"]= $_POST["email"];
        $_SESSION["phone"]= $_POST["user_phone"];
        $_SESSION["password"]= $_POST["user_pass"];
        echo "<meta http-equiv='refresh' content='0'>";
     }}
?>