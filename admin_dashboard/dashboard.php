<?php 
session_status() === PHP_SESSION_ACTIVE ?: session_start();
require("config.php");
$pic=$_SESSION["pic"];
$_SESSION["email"];
$_SESSION["phone"];
$_SESSION["create_at"];
$_SESSION["last_login"];
$_SESSION["address"];
?>
<?php
require("config.php");
$category_sql = "SELECT * FROM categories";
$product_sql = "SELECT * FROM products";
$users_sql = "SELECT * FROM users WHERE is_admin=0";
$orders_sql = "SELECT * FROM orders";
$reviews_sql = "SELECT * FROM reviews";
$category_data= ($conn->query($category_sql))->fetch_all(MYSQLI_ASSOC); 
$product_data= ($conn->query($product_sql))-> fetch_all(MYSQLI_ASSOC); 
$users_data= ($conn->query($users_sql))-> fetch_all(MYSQLI_ASSOC); 
$orders_data= ($conn->query($orders_sql))-> fetch_all(MYSQLI_ASSOC); 
$reviews_data= ($conn->query($reviews_sql))-> fetch_all(MYSQLI_ASSOC); 
$category_num= count(($conn->query($category_sql))->fetch_all(MYSQLI_ASSOC)); 
$product_num= count(($conn->query($product_sql))-> fetch_all(MYSQLI_ASSOC)); 
$users_num= count(($conn->query($users_sql))-> fetch_all(MYSQLI_ASSOC)); 
$orders_num= count(($conn->query($orders_sql))-> fetch_all(MYSQLI_ASSOC)); 
$reviews_num= count(($conn->query($reviews_sql))-> fetch_all(MYSQLI_ASSOC));
$total_in_stock = 0;
foreach($product_data as $product) {
    $total_in_stock +=$product['in_stock'];
}
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
    <h1 style="text-align: center;" class="text-primary">Welcome <?php echo  $_SESSION["user_name"]; ?></h1>
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4" style="">
                            <h3 style="text-align: center;" class="text-primary">Total number of users :</h3>
                            <h3 style="text-align: center;"> <?php echo $users_num; ?></h3>
                            <hr>
                            <h3 style="text-align: center;" class="text-primary">Total number of orders :</h3>
                            <h3 style="text-align: center;"> <?php echo $orders_num; ?></h3>
                            <hr>
                            <h3 style="text-align: center;" class="text-primary">Total number of products :</h3>
                            <h3 style="text-align: center;"> <?php echo $product_num; ?></h3>
                            <hr>
                            <h3 style="text-align: center;" class="text-primary">Total number of reviews :</h3>
                            <h3 style="text-align: center;"> <?php echo $reviews_num; ?></h3>
                            <hr>
                            <h3 style="text-align: center;" class="text-primary">Total number of products in stock :</h3>
                            <h3 style="text-align: center;"> <?php echo $total_in_stock; ?></h3>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <img class="position-relative rounded w-100 h-100"
                            src="<?php echo".././images/adminpic/$pic";?>"style="border: 0;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widget End -->
                  
<!-- Footer Start -->
<?php include('./include/include_footer.php');?>
