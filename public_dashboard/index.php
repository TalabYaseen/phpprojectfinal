<?php
// fetch data from product table
session_start();
include("../admin_dashboard/config.php");
$sql = "select * from products";
$data= $conn->query($sql);
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

	<!-- home page slider -->
	<div class="homepage-slider">
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-1">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
						<div class="hero-text">
							<div class="hero-text-tablecell">
							
								<h1>Own your dream Motorcycle</h1>
								<div class="hero-btns">
									<a href="shop.php" class="boxed-btn">Shop Now</a>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-right">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								
								<h1>Two wheels, endless fun</h1>
								<div class="hero-btns">
									<a href="shop.html" class="boxed-btn">Visit Shop</a>
									<a href="contact.php" class="bordered-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end home page slider -->



	<!-- Sale section  -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">On</span> Sale </h3><br>
					  <div class="alert alert-warning">Own your dream bike</div>

						<!-- <p>Own your dream bike</p> -->
					</div>
				</div>
			</div>

			<div class="row">
					<?php
							foreach($data as $ele){
								if ($ele["is_discount"]){
									echo '<div class="col-lg-4 col-md-6 text-center">
									<div class="single-product-item">
										<div class="product-image">';
										$pic=$ele["pic_main"];
										$id=$ele["product_id"];
										// echo $pic;
									echo "<a href='single-product.php?product_id=$id'>
											 <img src='../images/productpic/$pic' alt=''>
											 </a>";
									echo "</div>";
									$name = $ele['product_name'];
									echo "<h2>$name</h2>";
									$old_price = $ele['price'];
									$new_price =$old_price - ($ele['discount'] * $old_price)/100;
									echo "<p class='product-price'> 
												<span style='font-size: 20px'><del>$old_price$</del></span>
												<span style='font-size: 20px'>$new_price$</span> 
												</p>";
									echo "<a href='add_to_cart.php?productid=$id' class='cart-btn'>
												<i class='fas fa-shopping-cart'></i>
												Add to Cart </a>
												</div></div>";
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
	<!-- End Sale section  -->

	<!-- Categories section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> Categories</h3>
						<p>No road is too long when you have good company</p>
					</div>
				</div>
			</div>
			<div class="row">
						 <?php
						require_once("../admin_dashboard/config.php");
						$sql = "SELECT * FROM categories"; // query sentence
                                $conn->query($sql); // execute query 
                                $array = ($conn->query($sql));                 
                            
							foreach($array as $ele){
							$category = "<div class='col-lg-4 col-md-6 text-center'><div class='single-product-item'><div class='product-image'>";
							$category_pic=$ele['category_pic'];
							$category_name=$ele['category_name'];
							$category_pri=$ele['category_price'];
							$category .=	"<a href='shop.php'><img src='$category_pic' alt=''></a>
							</div>";	
							$category .= "<h3>$category_name</h3>";
							$category .= "<p class='product-price'> <span>$category_pri</span> </p>
							</div></div>";
					echo $category;
						}
							?>
							
			</div>
		</div>
	</div>
	<!-- End Categories section -->
	<!-- cart banner section -->
	<section class="cart-banner pt-100 pb-100">
    	<div class="container">
        	<div class="row clearfix">
            	<!--Image Column-->
            	<div class="image-column col-lg-6">
                	<div class="image">
                    	<div class="price-box">
                        	<div class="inner-price">
                                <span class="price">
                                    <strong>30%</strong> <br> for Cruiser category
                                </span>
                            </div>
                        </div>
                    	<img src="../img/category/cruiser1.png" alt="">
                    </div>
                </div>
                <!--Content Column-->
                <div class="content-column col-lg-6">
					<h3><span class="orange-text">Deal</span> of the month</h3>
                    <h4>Cruiser Bikes</h4>
                    <div class="text">A cruiser motorcycle is a motorcycle in the style of American machines from the 1930s to the early 1960s, including those made by Harley-Davidson, Indian, Excelsior and Henderson. The riding position usually places the feet forward and the hands up, with the spine erect or leaning back slightly. Typical cruiser engines emphasize easy rideability and shifting, with plenty of low-end torque but not necessarily large amounts of horsepower, and are traditionally V-twins, but inline engines have become more common.</div>

										
                    <!--Countdown Timer-->
                    <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2023/1/16"><div class="counter-column"><div class="inner"><span class="count" id="days"></span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count" id="hours"></span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count" id="minutes"></span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count"></span id="seconds">Secs</div></div></div></div>
                	<a href="shop.php" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Shop Now </a>

                </div>
            </div>
        </div>
    </section>
    <!-- end cart banner section -->

	<!-- testimonail-section -->
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="../images/background/Untitled design (43).png" alt="">
							</div>
							<div class="client-meta">
								<h3>Guy Martin<span>former motorcycle</span></h3>
								<p class="testimonial-body">
									"The reason I do it is because if you do it wrong, it will kill you.If you think it’s too dangerous then go home and cut your lawn and leave us to it."
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="../images/background/Untitled design (42).png" alt="">
							</div>
							<div class="client-meta">
								<h3>Marco Simoncelli<span>professional motorcycle</span></h3>
								<p class="testimonial-body">
									"You live more for five minutes going fast on a bike than other people do all their life."
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="../images/background/Untitled design (44).png" alt="">
							</div>
							<div class="client-meta">
								<h3> Vin Diesel <span>american actor</span></h3>
								<p class="testimonial-body">
									"It wasn't until I went to college and I got my first motorcycle that I understood the thrill of speed."
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->
	
	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					
					<div class="abt-bg">
						<a href="https://www.youtube.com/watch?v=eZS_UbALG0s" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Since Year 2023</p>
						<h2>We are <span class="orange-text">MOTORBIKE</span></h2>
						<p>We strive to provide the best possible service to motorcycle and scooter enthusiasts. Facilitating the process of owning motorcycles and scooters through their acquisition without down payment and easy installments.</p>
						<p>The world of motorcycles will take you from the prison of movement to the freedom of movement, and that we seek to provide through us.</p>
						<a href="about.php" class="boxed-btn mt-4">About US</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->
	
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
