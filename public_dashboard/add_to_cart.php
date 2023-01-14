<?php
session_start();
if (! isset($_SESSION["added_products"])){
$_SESSION["added_products"]= [];}
include ("../admin_dashboard/config.php");
$id=$_GET['productid'];
$sql = "select * from products where product_id=$id";
$product= $conn->query($sql);
$product = mysqli_fetch_array($product, MYSQLI_ASSOC);
$added_product = [$product["product_id"],1,$product["product_name"],$product["description"],$product["model_year"],$product["brand"],$product["price"],$product["category_id"],$product["pic_main"],$product["rate"],$product["in_stock"],$product["is_discount"],$product["discount"]];
array_push($_SESSION["added_products"],$added_product); 
// $url =$_SESSION["current_url"];
// echo $url;
// header("location:index_2.php");
// header("location:cart.php");
header("location: " . $_SERVER['HTTP_REFERER']);
