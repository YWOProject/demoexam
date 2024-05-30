<?php
require_once '../core/db.php';
$statement = $_GET['statement_status'];
$id = $_GET['id'];
$query = "UPDATE `statements` SET `statement_status` = '$statement' WHERE `id` = '$id'";
$response = mysqli_query($db, $query);
header('Location: ../../admin/index.php');