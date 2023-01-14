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
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">  

<form action="" method="POST" enctype="multipart/form-data"
>
    <div class="col-sm-12 col-xl-12">
      <div class="bg-secondary rounded h-100 p-4">
          <h4 class="mb-4">ADD PRODUCT</h4>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPassword"
                  placeholder="product_name" name="product_name"> 
              <label for="floatingPassword">product_name</label>
          </div>
          <div class="form-floating mb-3">
          <select class="form-select" id="floatingSelect" name="product_category"
                                    aria-label="Floating label select example">
                                    <?php
                                    $sql = "SELECT * FROM categories";
                                    $data= $conn->query($sql);
                                    foreach ($data as $ele) {
                                        $c_id=$ele['category_id'];
                                        $c_name=$ele['category_name' ];
                                        if ($c_id == $result['category_id']){
                                        echo "<option selected value='$c_id'>$c_name</option>";}else{
                                        echo "<option value='$c_id'>$c_name</option>";
                                        }
                                    }
                                    ?>
                                    <!-- <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option> -->
          </select>


              <label for="floatingPassword">product_category</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPassword"
                  placeholder="description" name="description">
              <label for="floatingPassword">description</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPassword"
                  placeholder="model_year" name="model_year">
              <label for="floatingPassword">model_year</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPassword"
                  placeholder="price" name="price">
              <label for="floatingPassword">price</label>
          </div>
          <div class="form-floating mb-3">
          <input class="form-control bg-dark" type="file" name="pic_main">
              <label for="floatingPassword"></label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPassword"
                  placeholder="in_stock" name="in_stock">
              <label for="floatingPassword">in_stock</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPassword"
                  placeholder="discount" name="discount">
              <label for="floatingPassword">discount</label><br>
              <button type="submit" class="btn btn-primary">Add Product</button>
          </div>
          
      </div>
    </div>
</form>
</div>
</div>
</div>
</div>
<?php include('./include/include_footer.php');?>
<?php
    // add products in products table
      if($_SERVER["REQUEST_METHOD"]==="POST"){
        require_once("config.php");
        // save photo in products folder
        $main_pic= $_FILES['pic_main'];
        $filename = $_FILES["pic_main"]["name"];
        $filename=trim($filename);
        $tempname = $_FILES["pic_main"]["tmp_name"];
        $folder = "../images/productpic" . $filename;
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }
    
        // insert products in database
        $sql = "INSERT INTO products (product_name, product_category, description, model_year, price, pic_main, in_stock, discount) VALUES ('$_POST[product_name]', '$_POST[product_category]','$_POST[description]','$_POST[model_year]','$_POST[price]','$filename', '$_POST[in_stock]', '$_POST[discount]' )";
        $conn->query($sql);
        header("location: blank.php");
          echo $_POST["product_name"];
          echo "<br>";
          echo $_POST["description"];
          echo "<br>";
          echo $_POST["model_year"];
          echo "<br>";
          echo $_POST["price"];
          echo "<br>";
          echo "<pre>";
          print_r($_FILES["pic_main"]) ;
          echo "</pre>";
          echo "<br>";
          echo $_POST["in_stock"];
          echo "<br>";
          echo $_POST["discount"];
          echo "<br>";
          echo $folder;
          }
