<?php
require_once('config.php');
if (isset($_GET['r_id'])){
    $id=$_GET['r_id'];
    $sql = "UPDATE reviews SET `state`='Confirmed' WHERE review_id  = $id";
    $result=$conn->query($sql);
    if ($result){
        header("location:reviews.php");
        }
}