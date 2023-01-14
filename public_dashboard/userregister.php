<?php
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $name_reg = "/^[a-zA-Z ]*$/";
    $phone_reg = "/^[0-9]{14}$/";
    $pass_reg = "/^(?=.?[A-Z])(?=.?[a-z])(?=.?[0-9])(?=.?[#?!@$%^&*-]).{8,}$/";
    $val_name = preg_match($name_reg, $_POST["user_name"]);
    // $val_email=(filter_var($_POST["user_email"], FILTER_VALIDATE_EMAIL));
    $val_phone = preg_match($phone_reg, $_POST["user_phone"]);
    $val_pass = preg_match($pass_reg, $_POST["user_pass"]);
    $val_repass = ($_POST["user_pass"] === $_POST["user_repass"]);
  if ($val_repass && $val_pass  && $val_phone && $val_email && $val_name){
    require_once('./admin_dashboard/config.php'); 
    $sql = "INSERT INTO users (name, email, phone,password) VALUES ('$_POST[user_name]','$_POST[user_email]','$_POST[user_phone]','$_POST[user_pass]')";
        $conn->query($sql); // بطبق جملة الكويري على الداتا بايس
        header("location:loginus.php");}else {
        echo "check your inputs please";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-------icon page ------- -->
    <script src="https://kit.fontawesome.com/387212a066.js" crossorigin="anonymous"></script>
    <title>register</title>
    <link rel="stylesheet" href="./style2.css">
<?php include("./websit_head_includer.php") ?>
</head>
<body style="background-image: url('../images/background/picture-confident-self-determined-young-female-rider-safety-helmet-standing-parking-lot-keeping-arms-crossed-looking-going-have-ride-motorcycle-around-night-city.jpg');">
<?php include("./website_nav_includer.php") ?>
<div class="container" style="width: 21%; min-height: 88vh;padding-top:5%;">
    <div class="forms" >
        <div class="form signup" style="  margin-top: 40px;  margin-right:40px;"  >
            <span  class="title" style="color:white ; font-size:2em; margin-bottom: 100px;">Registration </span>
            <form  action="" method="post"  style="margin-top: -15px;">   
            <div class="input-field">
                <input type="text" name="user_name" placeholder="Enter your name" required>
                <span id="fnameerror" class="text-danger font-weight-bold"></span>
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="input-field">
                <input type="email" name="user_email" placeholder="Enter your email"  id="email" required>
                <span id="mail" class="text-danger font-weight-bold"></span>
                <i class="fa-regular fa-envelope"></i>
            </div>

            <div class="input-field">
                <input type="text" name="user_phone" placeholder="Enter your number"  id="num" required>
                <span id="numerror" class="text-danger font-weight-bold"></span>
                <i class="fa-solid fa-mobile-screen"></i>
            </div>


            <div class="input-field">
                <input type="password" name="user_pass" class="password" placeholder="Create a password"  id="password" required>
                <span id="pass" class="text-danger font-weight-bold"></span>
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="input-field">
                <input type="password" name="user_repass" class="password" placeholder="Confirm a password" id="conPass"required>
                <span id="conpass" class="text-danger font-weight-bold"></span>
                <i class="fa-solid fa-lock"></i>

            </div>
            <div class="input-field button">
            <button style="color: white ;  box-shadow: 0 10px 15px black ; background:black; position: relative; right:30px; "  type="submit" onclick="logSubmit()">Sign up</button>
            </div>
            </form>
            <div class="login-signup"  style="position: relative; right:30px;">
            <span style="color:black " class="text"> Already a member?
            <a style="color:red " href="loginuser.php" class="text login-link">Login </a>
            </span>
            </div>
        </div>
    </div>
</div>
    <script src="../registration/registr.js"></script>
    <?php include("Footer.php"); ?>
</body>
</html>