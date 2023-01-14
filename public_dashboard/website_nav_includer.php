
<!--PreLoader-->
<!-- <div class="loader">
	<div class="loader-inner">
		<div class="circle"></div>
	</div>
</div> -->
<!--PreLoader Ends-->

<!-- header -->
<div class="top-header-area" id="sticker">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12 text-center">
				<div class="main-menu-wrap">
					<!-- logo -->
					<div class="site-logo">
						<a href="index.php">
							<img src="../public_dashboard/assets/img/logomotor (2).png" alt="">
						</a>
					</div>
					<!-- logo -->

					<!-- menu start -->
					<nav class="main-menu">
						<ul>
							<li class=""><a href="index.php">Home</a>
							</li>
							<li><a href="about.php">About</a></li>
						
							
							<li><a href="contact.php">Contact</a></li>
							<li><a href="shop.php">Shop</a>
								<!-- <ul class="sub-menu">
									<li><a href="shop.php">Standard</a></li>
									<li><a href="shop.php">Sport</a></li>
									<li><a href="shop.php">Cruiser</a></li>
									<li><a href="shop.php">Dual-Sport</a></li>
									<li><a href="shop.php">Scooter</a></li>
									<li><a href="shop.php">Electric</a></li>
								</ul> -->
								
							</li>
							<?php 
							if (isset($_SESSION['user'])) {
								if ($_SESSION['user']){
								echo "<li><a href='./logout.php'>Logout</a></li>";}else{
									echo "<li><a href='./loginuser.php'>Login</a></li><li><a href='./userregister.php'>Register</a></li>";
								}
							}else{
								echo "<li><a href='./loginuser.php'>Login</a></li><li><a href='./userregister.php'>Register</a></li>";}
							?>
							<li>
								<div class="header-icons">
									<a class="shopping-cart" href="cart.php" style="font-size:13px ;"><i class="fas fa-shopping-cart fa-2x"></i><?php  if (isset($_SESSION['added_products']) ){echo count($_SESSION['added_products']);}?></a>
								</div>
							</li>
						</ul>
					</nav>
					<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
					<div class="mobile-menu"></div>
					<!-- menu end -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end header -->