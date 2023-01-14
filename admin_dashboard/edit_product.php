<?php
require_once('config.php');
$id = $_GET["editid"];
$sql = "SELECT * FROM `products` INNER JOIN categories WHERE products.category_id = categories.category_id AND product_id = $id "; // return only one row
// echo "<pre>";
// print_r((($conn->query($sql))->fetchAll(PDO::FETCH_ASSOC))[0]);
// echo "</pre>";
$result =(($conn->query($sql))->fetch_array(MYSQLI_ASSOC)
); // return only one array, there is one array inside main array
// echo "<pre>";
// print_r($result);
// echo "</pre>";

// edit products
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $e_name = $_POST['edit_product_name'];
    $e_category = $_POST['edit_product_category'];
    $e_description = $_POST['edit_description'];
    $e_model = $_POST['edit_model_year'];
    $e_price = $_POST['edit_price'];
    $e_pic = $_FILES["pic_main"]["name"];
    $e_stock = $_POST['edit_in_stock'];
    $e_discount = $_POST['edit_discount'];
    if($e_discount && !empty($e_pic)){
        $sql = "UPDATE products SET `product_name`='$e_name',`category_id`='$e_category',`description`='$e_description',`model_year`='$e_model',`price`='$e_price',`pic_main`='$e_pic' ,`is_discount`= 1,
    `in_stock`='$e_stock',`discount`='$e_discount' WHERE product_id = $id";}
    else if (!empty($e_pic)){
    $sql = "UPDATE products SET `product_name`='$e_name',`category_id`='$e_category',`description`='$e_description',`model_year`='$e_model',`price`='$e_price',`pic_main`='$e_pic',`in_stock`='$e_stock' WHERE product_id = $id";}
    else if($e_discount) {
         $sql = "UPDATE products SET `product_name`='$e_name',`category_id`='$e_category',`description`='$e_description',`model_year`='$e_model',`price`='$e_price',`in_stock`='$e_stock',`discount`='$e_discount',`is_discount`= 1 WHERE product_id = $id";}
    else {
         $sql = "UPDATE products SET `product_name`='$e_name',`category_id`='$e_category',`description`='$e_description',`model_year`='$e_model',`price`='$e_price',`in_stock`='$e_stock' WHERE product_id = $id";}
    
    $res = $conn->query($sql);
    $main_pic= $_FILES['pic_main'];
        $filename = $_FILES["pic_main"]["name"];
        $filename=trim($filename);
        $tempname = $_FILES["pic_main"]["tmp_name"];
        $folder = "../images/productpic/" . $filename;
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        };
    echo "<pre>";
    print_r($_FILES["pic_main"]);
    echo "</pre>";
    
    if ($res){
        header("location:blank.php");
    }else {
        echo "Data NOT inserted";
    }
    echo $sql;
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

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid position-relative d-flex p-0">
<?php
session_start();
include("./includers/sidebar.php");
?>
<div class="content">
<?php
include("./include/include_navbar.php");
?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="col-sm-12 col-xl-12">
      <div class="bg-secondary rounded h-100 p-4">
          <h4 class="mb-4">EDIT PRODUCT</h4>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPassword"
                  placeholder="Password" name="edit_product_name"  value=<?php
            echo $result["product_name"];
            ?>>
              <label for="floatingPassword">product_name</label>
          </div>
          <div class="form-floating mb-3">

          

          <select class="form-select" id="floatingSelect" name="edit_product_category"
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
                  placeholder="Password" name="edit_description" value=<?php
            echo $result["description"];
            ?>>
              <label for="floatingPassword">description</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPassword"
                  placeholder="Password" name="edit_model_year" value=<?php
            echo $result["model_year"];
            ?>>
              <label for="floatingPassword">model_year</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPassword"
                  placeholder="Password" name="edit_price" value=<?php
            echo $result["price"];
            ?>>
              <label for="floatingPassword">price</label>
          </div>
          <div class="form-floating mb-3">
          <input class="form-control bg-dark" type="file" name="pic_main"
          <?php echo $result["pic_main"];?>>
              <label for="floatingPassword"></label>
          </div>
          <!-- <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPassword"
                  placeholder="Password" name="edit_pic_main" value=<?php
            echo $result["pic_main"];
            ?>>
              <label for="floatingPassword">pic_main</label>
          </div> -->
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPassword"
                  placeholder="Password" name="edit_in_stock" value=<?php
            echo $result["in_stock"];
            ?>>
              <label for="floatingPassword">in_stock</label>
          </div>
          <div class="form-floating mb-3">
              <input type="number" class="form-control" id="floatingPassword"
                  placeholder="Password" name="edit_discount" value=<?php
            echo $result["discount"];
            ?>>
              <label for="floatingPassword">discount</label><br>
              <button type="submit" class="btn btn-primary">EDIT</button>
          </div>
          
      </div>
    </div>
</form>
    <!-- <div style="margin: auto;">
        <form method="POST" >
            <label>
                Name:
            </label>
            <br>
            <input type="text" name ="e_name" value=<?php
            echo $result["name"];
            ?>>
            <hr>
            <label>
            email:
            </label>
            <br>
            <input type="text" name ="e_email" value=<?php
            echo $result["email"];
            ?>>
            <hr>
            <label>
                Phone Number:
            </label>
            <br>
            <input type="text" name ="e_phone" value=<?php
            // echo $result["phone"];
            ?>>
            <hr>
            <label>
                Password:
            </label>
            <br>
            <input type="text" name ="e_pass" value=<?php
            // echo $result["password"];
            ?>>
            <hr>
            <label>
                Is admin:
            </label>
            <br>
            <input type="text" name ="e_is_admin" value=<?php
            // echo $result["is_admin"];
            ?>>
            <hr>
            <button type="submit">update</button>
        </form>
    </div> -->
</div>
</div>
<?php include('./include/include_footer.php');?>
</body>
</html>