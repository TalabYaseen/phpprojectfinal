<?php
require("config.php");

if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['category_id'])){
    //Take Data From Web Form
    $category_id=$_POST['category_id'];
    $category_name=$_POST['category_name'];
    $file = $_FILES['file'];
    $img_name = $file['name'];

    if(!empty($img_name)){
        require("category_upload.php");
        $sql="UPDATE categories SET category_name='$category_name',category_pic='$upload_path' WHERE category_id ='$category_id'";  

    }else{
        $sql="UPDATE categories SET category_name='$category_name' WHERE category_id ='$category_id'";  

    }

    $conn->query($sql);
    header("location:categories.php");
    

    // print_r($file);
    // echo $img_name;
   

}
else{
    echo "err.";
}

?>