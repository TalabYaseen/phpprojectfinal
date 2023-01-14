<?php
session_start();
($_SESSION['user'] = []);
// redirect user for home page
header('location:./index.php');
?>