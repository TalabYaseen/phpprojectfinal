<?php
// connect to database
require_once('../admin_dashboard/config.php'); 
// when yser click on submit
if ($_SERVER["REQUEST_METHOD"] === "POST"){
// assign user inputs for variables
$inputpass = $_POST["pass"];
$inputemail = $_POST["mail"];
// query sentence using user inputs as conditions
$sql = "SELECT * FROM users where email = '$inputemail'  and password = '$inputpass'"; 
// excute query sentence
$conn->query($sql);
// extract the resulting array for excuted query
$user = ($conn->query($sql))->fetch_assoc();
// if user inputs does exist in our data base
  if($user){
        session_start();
        // save user data in session for later usage
        $_SESSION['user']["id"]= $user["user_id"];
        $_SESSION['user']["name"]= $user["name"];
        $_SESSION['user']["email"]= $user["email"];
        $_SESSION['user']["phone"]= $user["phone"];
        $_SESSION['user']["password"]= $user["password"];
        $_SESSION['user']["is_admin"]= $user["is_admin"];
        // redirect user for home page
        header('location:./index.php');
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
    <title>login</title>
    <!-- <link rel="stylesheet" href="style1.css"> -->
<?php include("./websit_head_includer.php") ?>
</head>
<body style="background-image: url('../images/background/picture-confident-self-determined-young-female-rider-safety-helmet-standing-parking-lot-keeping-arms-crossed-looking-going-have-ride-motorcycle-around-night-city.jpg');background-size:cover;">
<?php include("./website_nav_includer.php") ?>
<div class="container" style="width: 23%; min-height: 88vh;  ">
    <br>
    <br>
    <form action="" method="post" style="margin-top: 10%; margin-top: 120px; ">
      
      <b>
        <label style="color:white ; font-size:20px;" class="em" for="email">Email:</label>
      </b>
      <br>
      <input type="email" name="mail" class="form-control" >
      <br>
      <b>
        <label style="color:white ; font-size:20px" class="ps" for="password">Password:</label>
      </b>
      <br>
      <input   type="password" name="pass" class="form-control">
      <br>
      <button style="color: white ;  box-shadow: 0 10px 15px black ; background:black ;width:6em;height:3em;border-radius:1em;position: relative; left:110px;" type="submit" id="sub" >Login </button>
      <br>
      <?php  if ($_SERVER["REQUEST_METHOD"] === "POST"){echo "<p style='color:red'>Invalid email or password<p>";}
      ?>
      <br>
      <br>
      <a style="color:white ; font-size:20px; position: relative;left:40px;" href="userregister.php" class="acc">Need an account ?<span    href="userregister.php"   style="color:red"> Sign up</span> </a>
      
    </form> 
    <br> 
</div>   
<?php include("Footer.php"); ?>
</body>
</html>