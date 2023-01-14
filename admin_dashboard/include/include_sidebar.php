<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
$pic=$_SESSION["pic"];?>
<div class="sidebar pe-4 pb-3">
<nav class="navbar bg-secondary navbar-dark">
                <a href="./adminprofilecopy.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>MotorBike</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                    <img class="rounded-circle" src="<?php
                          echo".././images/adminpic/$pic";?>"
                          alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo  $_SESSION["user_name"]; ?></h6>
                        <span>Admin</span>
            
                    </div>
                </div>
                <div class="navbar-nav w-100">
                     <?//php echo basename($_SERVER['PHP_SELF']); ?> 
                    <a href="../admin_dashboard/adminprofile.php" class="nav-item nav-link <?php if (basename($_SERVER['PHP_SELF'])=="dashboard.php") {echo 'active';}?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if (basename($_SERVER['PHP_SELF'])=="blank.php" || (basename($_SERVER['PHP_SELF'])== "add_product.php")) {echo 'active';}?>" data-bs-toggle="dropdown"><i class="fa-solid fa-motorcycle"></i></i>Products</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../admin_dashboard/blank.php" class="nav-item nav-link"><i class="fa-solid fa-eye"></i>Show Products</a>
                            <a href="../admin_dashboard/add_product.php" class="nav-item nav-link"><i class="fa-solid fa-plus"></i>Add Product</a>
                        </div>
                    </div> 
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if (basename($_SERVER['PHP_SELF'])=="categories.php" || (basename($_SERVER['PHP_SELF'])== "add_categories.php" )) {echo 'active';}?>" data-bs-toggle="dropdown"><i class="fa-solid fa-file"></i>Categories</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="./categories.php" class="nav-item nav-link"><i class="fa-solid fa-eye"></i>View Categories</a>
                        <a href="./add_categories.php" class="nav-item nav-link"><i class="fa-solid fa-file-arrow-up"></i>Add Category</a>
                        </div>
                    </div> 
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if (basename($_SERVER['PHP_SELF'])=="users.php" || (basename($_SERVER['PHP_SELF'])== "add_user.php")) {echo 'active';}?>" data-bs-toggle="dropdown"><i class="fa-solid fa-users"></i></i>Users</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="./users.php" class="nav-item nav-link"><i class="fa-solid fa-eye"></i>View Users</a>
                        <a href="./add_user.php" class="nav-item nav-link"><i class="fa-solid fa-user-plus"></i>Add User</a>
                        </div>
                    </div> 
                    <a href="./order.php" class="nav-item nav-link <?php if (basename($_SERVER['PHP_SELF'])=="order.php") {echo 'active';}?>"><i class="fa-solid fa-coins"></i>Orders</a>
                    <a href="./reviews.php" class="nav-item nav-link <?php if (basename($_SERVER['PHP_SELF'])=="reviews.php") {echo 'active';}?>"><i class="fa-solid fa-comments"></i>Comments</a>
                    <a href="./logout.php" class="nav-item nav-link "><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
                    </div>
                </nav>
                </div>








         
