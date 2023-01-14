<?php
require("config.php");

if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['category_id'])){
    //Take Data From Web Form
    $category_id=$_POST['category_id'];
//get the Data from database (Read)
    $sql="UPDATE categories SET category_is_deleted='1' WHERE category_id ='$category_id'";  
    $conn->query($sql);
    header("location:categories.php");

}

?>