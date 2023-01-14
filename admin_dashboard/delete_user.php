<?php
require_once('config.php');
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql = "UPDATE users SET `is_deleted`=1 WHERE user_id = $id";
    $result=$conn->query($sql);
    if ($result){
        header("location:users.php");
        }else {
        // echo "r";
    }
}