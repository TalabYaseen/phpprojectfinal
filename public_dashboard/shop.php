<?php
session_start();
require("../admin_dashboard/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
	<?php include("./websit_head_includer.php") ?>
	<title>Motorbike</title>
</head>
	<!-- title -->
<body>
	<?php include("./website_nav_includer.php") ?>

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>All Products</p>
						<h1>Shop</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
									<li class="active" data-filter="*">All</li>
								<?php
								$sql = "SELECT * FROM categories WHERE category_is_deleted=0";
								$select_categories= $conn->query($sql);
								foreach($select_categories as $fetch_category){
								?>										
								<li data-filter=".<?= $fetch_category['category_id']; ?>"><?= $fetch_category['category_name']; ?></li>
								<?php
								}
								?>
                        </ul>
                    </div>
                </div>
            </div>

			<div class="row product-lists">
			<?php					
					$sql = "SELECT * FROM `products`";
					$select_products= $conn->query($sql);
					foreach($select_products as $product){
					?>

							<div class="col-lg-4 col-md-6 text-center <?= $product['category_id']; ?>">
								<div class="single-product-item">
									<div class="product-image">
										<a href="single-product.php?product_id=<?= $product['product_id']; ?>">
										<img width=200px height=200px src='../images/product/<?= $product['pic_main']; ?>' alt="">
										</a>
										<h2 STYLE="font-size:27px"><?= $product['product_name']; ?></h2>
										<span STYLE="font-size:20px"><?= $product['price']; ?></span> <SPAN STYLE="font-size:16pt">$</SPAN></br></br>
										<!-- <a href="add_to_cart.php?productid=<?= $product['product_id']; ?>" class="cart-btn"> <SPAN STYLE="font-size:16pt">Add to Cart</SPAN> </a>					 -->
										<form>
											<!-- <input type="hidden" name="selected_prod" value=<?=$selected_prod;?>> -->
									
											<!-- <button type="submit" class="cart-btn> -->
											<a href="add_to_cart.php?productid=<?=$product['product_id']?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
											<!-- </button> -->
										</form>
										<?php
											// if ($_SERVER['REQUEST_METHOD']=="POST") {
											//  $_SESSION["added_products"] = [];
											// 	// $added_product = [$product["product_id"],$_POST["qun"],$product["product_name"],$product["description"],$product["model_year"],$product["brand"],$product["price"],$product["category_id"],$product["pic_main"],$product["rate"],$product["in_stock"],$product["is_discount"],$product["discount"]];
											// 	// $added_product = array($_POST["selected_prod"]);
											// 	$added_product = unserialize($_POST["selected_prod"]);
											// 	// print_r($added_product);
											// 	// if (! isset($_SESSION["added_products"])){
											// 	// $_SESSION["added_products"] = [];
											// 	// }
											// 	array_push($_SESSION["added_products"],$added_product);
											// 	print_r($_SESSION["added_products"]);
											// }
										?>
									</div>
								</div>
							</div>
					<?php
					}
					?>
				
			</div>

			<!-- <div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a class="active" href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div> -->
		</div>
	</div>
	<!-- end products -->
<!-- __________________________________________________________ -->
	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="../public_dashboard/assets/img/company-logos/R (1).png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../public_dashboard/assets/img/company-logos/bmw.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../public_dashboard/assets/img/company-logos/honda.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../public_dashboard/assets//img/company-logos/kkk.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../public_dashboard/assets/img/company-logos//ktm.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../public_dashboard/assets/img/company-logos/Suzuki.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	<!-- copyright -->
	<?php include("Footer.php"); ?>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>