<?php
session_start();
require_once '../core/db.php';
$grn = $_POST['grn'];
$grn_desc = $_POST['grn_desc'];
$user_id = $_SESSION['user']['id'];
$query = "INSERT INTO `statements` (`grn`, `grn_desc`, `user_id`) VALUES ('$grn', '$grn_desc', '$user_id')";
$response = mysqli_query($db, $query);
header('Location: ../../index.php');
