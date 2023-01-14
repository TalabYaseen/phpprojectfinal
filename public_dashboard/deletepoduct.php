<?php
session_start();
// echo $_GET["index"];
unset($_SESSION["added_products"][$_GET["index"]]);
header("location:http://localhost/php_project/public_dashboard/cart.PHP");