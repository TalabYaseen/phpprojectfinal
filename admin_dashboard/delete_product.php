<?php
require_once('config.php');
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    // make product_is_deleted=1 when click on delete
    $sql = "UPDATE products SET `product_is_deleted`=1 WHERE product_id = $id";
    $result=$conn->query($sql);
    if ($result){
        header("location:blank.php");
        }else {
        echo "DATA NOT DELETED";
    }
}
