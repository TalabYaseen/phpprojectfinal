<?php 
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

    <?php include('./include/include_head.php');?>


            <!-- Form Start -->

<?php

// Retrieve the category ID from the URL
// $category_id = $_GET['category_id'];

// Prepare a SELECT statement to retrieve the products in the selected category
$sql = "SELECT * FROM products";
$products= $conn->query($sql);


// Fetch the result as an associative array
// $products = $data->fetchAll(PDO::FETCH_ASSOC);

// Loop through the array of products and output each one
foreach ($products as $product) {
    echo '<h3>' . $product['product_name'] . '</h3>';
    echo '<p>' . $product['description'] . '</p>';
    echo '<p>Price: $' . $product['price'] . '</p>';
}

?>
                    

               
            <!-- Form End -->


<!-- Footer Start -->
<?php include('./include/include_footer.php');?>
