<?php 
session_status() === PHP_SESSION_ACTIVE ?: session_start();
require("config.php");
$pic=$_SESSION["pic"];
$_SESSION["email"];
$_SESSION["phone"];
$_SESSION["create_at"];
$_SESSION["last_login"];
$_SESSION["address"];
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
    <h1 style="text-align: center;" class="text-primary">Welcome <?php echo  $_SESSION["user_name"]; ?></h1>
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4" style="">
                            <h3 style="text-align: center;" class="text-primary">Your last login was in</h3>
                            <h3 style="text-align: center;"> <?php echo $_SESSION['last_login']; ?></h3>
                            <hr>
                            <h3 style="text-align: center;" class="text-primary">Personal info</h3>
                            <h3 style="text-align: center;"> Email : <?php echo $_SESSION['email']; ?></h3>
                            <h3 style="text-align: center;"> Phone : <?php echo $_SESSION['phone']; ?></h3>
                            <h3 style="text-align: center;"> Address : <?php echo $_SESSION['address']; ?></h3>
                            <hr>
                            <h3 style="text-align: center;" class="text-primary">Joined us in</h3>
                            <h3 style="text-align: center;"> <?php echo $_SESSION['create_at']; ?></h3>
                            <hr>
                            <a href="./adminprofile.php"><button type="button" class="btn btn-warning m-2">Edite</button></a>

                            

                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <img class="position-relative rounded w-100 h-100"
                            src="<?php echo".././images/adminpic/$pic";?>"style="border: 0;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widget End -->
                  
<!-- Footer Start -->
<?php include('./include/include_footer.php');?>
