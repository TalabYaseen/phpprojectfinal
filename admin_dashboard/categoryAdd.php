<?php
require("config.php");

require("category_upload.php");

/////// INSERT
$category_name = $_POST['category_name'];
$category_price = $_POST['category_price'];
// echo "$category_name";
// echo "$upload_path";
$sql = "INSERT INTO categories (category_name,category_price,category_pic) VALUES ('$category_name','$category_price','$upload_path')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("location:categories.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>