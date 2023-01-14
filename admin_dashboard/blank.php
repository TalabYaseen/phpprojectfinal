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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div style="text-align: center; vertical-align: middle;" id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php
        require_once("config.php");
        // session_start();
        include("./includers/sidebar.php");
        
        ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">

        
            <!-- Navbar Start -->
            <?php
            include("./include/include_navbar.php");
            ?>
            <!-- Navbar End -->


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row bg-secondary rounded align-items-center justify-content-center mx-0">
                    <!-- <div class="col-md-6 text-center">
                        <h3>This is blank page</h3>
                    </div> -->
                    <?php

                   // build a head of table
                    $html = "<div class='col-sm-12 col-xl-12'>
                        <div class='bg-secondary rounded h-100 p-4'>
                            <table  class='table table-bordered'>
                                <thead>
                                    <tr>
                                        <th scope='col' style='text-align: center';>Product Name</th>
                                        <th scope='col' style='text-align: center';>Product Category</th>
                                        <th scope='col' style='text-align: center';>Model Year</th>
                                        <th scope='col' style='text-align: center';>Price</th>
                                        <th scope='col' style='text-align: center';>Main Pic</th>
                                        <th scope='col' style='text-align: center';>In Stock</th>
                                        <th scope='col' style='text-align: center';>Discount(%)</th>
                                        <th scope='col' style='text-align: center';>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>";   
                                // build body table from products table that exist in database
                                require_once("config.php");
                                $sql = "SELECT * FROM products INNER JOIN categories WHERE products.category_id = categories.category_id "; // query sentence
                                $conn->query($sql); // execute query 
                                $array = ($conn->query($sql));                 
                                    foreach($array as $ele){
                                        // delete product from admin_dashboard product table, not from database
                                        if($ele['product_is_deleted'] == 0){
                                    
                                        $P_id=$ele['product_id'];
                                        $proname=$ele['product_name'];
                                        $procategory=$ele['category_name'];
                                        $desc=$ele['description'];
                                        $mod=$ele['model_year'];
                                        $pri=$ele['price'];
                                        $pic=$ele['pic_main'];
                                        $sto=$ele['in_stock'];
                                        $dis=$ele['discount'];

                                $html .= "<td style='text-align: center; vertical-align: middle;'>$proname</td>";
                                $html .= "<td style='text-align: center; vertical-align: middle;'>$procategory</td>";
                                $html .= "<td style='text-align: center; vertical-align: middle;'>$mod</td>";
                                $html .= "<td style='text-align: center; vertical-align: middle;'>$pri</td>";
                                $html .= "<td><img width='100px';height='100px' src='../images/productpic/$pic'></td>";
                                $html .= "<td style='text-align: center; vertical-align: middle;'>$sto</td>";
                                $html .= "<td style='text-align: center; vertical-align: middle;'>$dis%</td>";
                                $html .= "<td style='text-align: center; vertical-align: middle;'>
                                <a href='delete_product.php?deleteid=$P_id'><button type=button' class='btn btn-square btn-primary m-2'><i class='fa-solid fa-trash-can'></i></button></a><br>
                                <a href='edit_product.php?editid=$P_id'><button type='button' class='btn btn-square btn-outline-warning m-2'><i class='fa-solid fa-pen-to-square'></i></button></a>
                                </td></tr>";

                            } }
                            // <button type="button" class="btn btn-square btn-primary m-2"><i class="fa fa-home"></i></button>


                            // <button type="'button' class='btn btn-square btn-outline-warning m-2'><i class='fa fa-home'></i></button>


                                    $html .= 
                                "</tbody>
                            </table>
                            </div>
                        </div>";
                        echo $html;
// $picc= "SELECT `pic_main` FROM `products` WHERE product_id=$P_id";
// $piccc=$conn->query($picc);
// foreach($piccc as $elem){
//     echo $elem["pic_main"];
// }
                    ?>
                    <!-- <img src="../" > -->
                    




                </div>
            
            <!-- Blank End -->


            <!-- Footer Start -->
            <!-- <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end"> -->
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            <!-- Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Footer End -->
        
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <?php include('./include/include_footer.php');?>

