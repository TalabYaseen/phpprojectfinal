<?php 
$server="localhost";
$userName="root";
$password="";
$dbName="projectphp5";

$conn= mysqli_connect($server,$userName,$password,$dbName);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    // echo "you are connected."."<br>";
}
?>

