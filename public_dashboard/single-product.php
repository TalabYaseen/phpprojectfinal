<?php
session_start();
include("../admin_dashboard/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
	<?php include("./websit_head_includer.php") ?>
	<title>Motorbike cart</title>
</head>
<body>
	<?php include("./website_nav_includer.php") ?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>See more Details</p>
						<h1>Single Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<?php
	// nnnn = product id sent in url
	$product_id = $_GET["product_id"];
	// $product_id = 1;
	$sql = "select * from products where product_id = $product_id";
	$data= $conn->query($sql);
	$product = mysqli_fetch_array($data, MYSQLI_ASSOC);
	// print_r($product);
	?>
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
					<?php 
						$pic=$product["pic_main"];
						$pic = trim($pic) ;
						echo "<img style='width: 30em; height:22em' src='../upload/$pic' alt=''>";
						?>
					<!-- <img style="width: 30em; height:25em" src='../upload/$pic' alt=''> -->
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>
							<?php
							echo $product["product_name"] ;
							?>
						</h3>
						<p class="single-product-pricing"><span></span>
						<?php
							if ($product["is_discount"]){
								$old_price = $product['price'];
								$new_price =$old_price - ($product['discount'] * $old_price)/100;
								echo "<del style='color:gray;font-weight: normal;'>$old_price $</del> <br>";
								echo $new_price ;
								echo " $" ;
							}
							else {echo $product["price"] ;
							echo " $" ;}
							?>
						</p>
						<p>
						<?php
							echo str_replace("—","<br>",$product["description"]);
							?>
						</p>
						<div class="single-product-form">
							<form action="" method="POST">
								<input type="number" name="qun" value="1" min="1" 
								max="<?php
								echo $product["in_stock"] ?>">
								<!-- <button type="submit">
							<p type="submit"><a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
								</button> -->
								<a href="add_to_cart.php?productid=<?=$product['product_id']?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
							</form>
							<?php
							// if ($_SERVER['REQUEST_METHOD']=="POST") {
								
							// 	$added_product = [$product["product_id"],$_POST["qun"],$product["product_name"],$product["description"],$product["model_year"],$product["brand"],$product["price"],$product["category_id"],$product["pic_main"],$product["rate"],$product["in_stock"],$product["is_discount"],$product["discount"]];
							// 	if (! isset($_SESSION["added_products"])){
							// 	$_SESSION["added_products"] = [];
							// 	}
							// 	array_push($_SESSION["added_products"],$added_product);
								// print_r($_SESSION["added_products"]);
							// }
							?>
							<p><strong>Category: </strong>	
						
							<?php
							$cat_id = $product["category_id"];
							$sql = "select * from categories where category_id = $cat_id";
							$cat= $conn->query($sql);
							$cat = mysqli_fetch_array($cat, MYSQLI_ASSOC);
							echo $cat["category_name"];
							$cat_id=$cat["category_id"]
							?>							
							</p>
						</div>
						<!-- <h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul> -->
					</div>
				</div>
			</div>
		</div>
		<div style="margin-left:10% ;margin-right:10% ;">
		<hr>
			<h3>
			Reviews:
			</h3>
			<?php
			$query = "SELECT * FROM reviews INNER JOIN users 
                ON (reviews.user_id = users.user_id) WHERE product_id = $product_id AND state = 'Confirmed'";
                $stmt = $conn->query($query);
                $stmt =$stmt->fetch_all(MYSQLI_ASSOC); ?>
<?php
foreach ($stmt as $comment) {
            $comment_id = $comment['review_id'];
            $user_id = $comment['user_id'];
            $product_id = $comment['product_id'];
            $comment_content = $comment['review_text'];
            $user_name = $comment['user_name'];
			echo "<div style='margin-right: 10%;'>";
			echo $user_name;
			echo "<br>";
			echo  $comment_content;
			echo "<hr>";
			echo "</div>";
			
		}
		?>
		<?php if (isset($_POST['submit_comment'])) {
            if (isset(($_SESSION['user']))) {
            if (!empty(($_SESSION['user']))) {
				
				$user_id = (INT)$_SESSION['user']['id'];
               $comment_text = $_POST['comment_text'];
			   $id = (int)$product_id;
               $sqlInserComment = "INSERT INTO reviews
			   (user_id,product_id,review_text) 
               VALUES ('$user_id','$id','$comment_text')";
               $stmt = $conn->query($sqlInserComment);
			   echo "<div class='alert alert-success' role='alert'>Your review will be confirmed soon,thank you.</div>";
            }else {
				echo "<span style='color:red'>Login to submit your review</span>";
			}
         }else {
			echo "<span style='color:red'>Login to submit your review</span>";
		}
		}

         ?>
		 <form action="" method="post">
			<div style="margin-right: 10%;">
            <div >
               <div >
                  <textarea style="font-size:20px; border:2px solid silver"  class="form-control" name="comment_text" cols="12"  rows="3" placeholder="Add your comment" value="" required></textarea>
               </div>
            </div>
            <div class="col-md- text-right">
               <button type="submit" name="submit_comment" class="btn submit_btn" style="background-color:red ; font-size : 20px;color:white">

                  Submit Now
               </button>
            </div>
			</div>
            </form>
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
				</div>
			</div>
			<div class="row">
			<?php
							// session_start();

							include("../admin_dashboard/config.php");

							$sql = "select * from products where category_id=$cat_id";
							$data= $conn->query($sql);
				foreach($data as $ele){
					if ($ele["is_discount"]){
						echo '<div class="col-lg-4 col-md-6 text-center">
						<div class="single-product-item">
						<div class="product-image">';
						$pic=$ele["pic_main"];
						$id=$ele["product_id"];
						// echo $pic;
						echo "<a href='single-product.php?product_id=$id'><img src='../upload/$pic' alt=''></a>";
						echo "</div>";
						$name = $ele['product_name'];
						echo "<h3>$name</h3>";
						$old_price = $ele['price'];
						$new_price =$old_price - ($ele['discount'] * $old_price)/100;
						echo "<h3> <span class='product-price'><del>$old_price </del></span><span class='product-price'>$$new_price</span></h3>";
						echo "<a href='add_to_cart.php?productid=$id' class='cart-btn'><i class='fas fa-shopping-cart'></i> Add to Cart</a></div></div>";
						// $url = getcwd();
						// $url = (parse_url($url, PHP_URL_FRAGMENT));
						// $url =str_replace('C:\xampp\htdocs',"localhost",$url);
						// echo $url;
						// $_SESSION["current_url"]= $url;
					}
				}
				?>
				</div>
			</div>
		</div>
	</div>
	<!-- end more products -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
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
