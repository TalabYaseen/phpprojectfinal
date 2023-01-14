<?php
session_start();
include("./config.php");
$id = $_SESSION["user_id"];
date_default_timezone_set('Asia/Amman');
$last_login = date('Y:m:d H:m:s');
$login_database = "UPDATE `users` SET `last_login`='$last_login' WHERE `user_id`= '$id' ";
$data = $conn->query($login_database);
session_unset();
session_destroy();
header('location:./index.php');