<?php
session_start();
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
						<h1>Check Out Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Billing Address
						        </button>
						      </h5>
						    </div>
							
						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">

						        <div class="billing-address-form">
						        	<form action="" method="POST">
						        		<p><input name="user_address" type="text" placeholder="Address" required></p>
						        		<p><input name="user_phone" type="tel" placeholder="Phone" required></p>
										<?php
										if (isset($_SESSION['flag'])){
											if (($_SESSION['flag'])){
										echo "<div class='alert alert-success' role='alert'>Your Oeder has submited,thank you.</div>";
										$_SESSION['flag'] = false;
										}}
										?>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
				
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th>Your order Details</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
								<tr>
									<td>Product</td>
									<td>Total</td>
								</tr>
								<?php
								$total = 0;
								if(isset($_SESSION["added_products"]) ){
								foreach ($_SESSION["added_products"] as $key => $ele){
									$product_total =$ele[1]*$ele[6];
									$total += $product_total;
									$html = "<tr>";
									$html .= "<td>$ele[2]</td>";
									$html .= "<td>$product_total</td></tr>";
									echo $html;
								}}
								?>
							</tbody>
							<tbody class="checkout-details">
									<td>Total</td>
									<td>
										<?php
										echo $total;
										?>
									</td>
								</tr>
							</tbody>
						</table>
						<button type="submit" class="btn btn-danger rounded-pill m-2">Place Order</button>
					</div>
					<?php
					if (($_SERVER['REQUEST_METHOD']=="POST") && isset($_SESSION['added_products']) ) {
					if ($_SESSION['added_products']){
					if ($_SESSION['user']){
					$id = $_SESSION['user']['id'] ;
					$ADDRESS=$_POST["user_address"];
					$PHONE=$_POST["user_phone"];
					$sql = "INSERT INTO `orders`(`user_id`,`order_total`, `address`, `order_phone`) VALUES ('$id','$total','$ADDRESS','$PHONE')";
					include ("../admin_dashboard/config.php");
					$product= $conn->query($sql);
					$sql = "SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1;";
					$order_id= $conn->query($sql);
					$order_id = mysqli_fetch_array($order_id, MYSQLI_ASSOC);
					$order_id = $order_id["order_id"];
					foreach($_SESSION["added_products"] as $ele){
					$total = $ele[1]*$ele[6];
					$sql = "INSERT INTO `order_details`(`order_id`, `product_id`, `quantity`, `total`) VALUES ('$order_id','$ele[0]','$ele[1]','$total')";
					$product= $conn->query($sql);						
					echo "order sent successfully";
					echo "<meta http-equiv='refresh' content='0'>";
					$_SESSION['added_products'] = [];
					$_SESSION['flag'] = true;
					}}else {
					echo "login to place your order";
					}
					}}
					?>
				</div>
			</div>
		</div>
	</div>
	</form>
	<!-- end check out section -->
	
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