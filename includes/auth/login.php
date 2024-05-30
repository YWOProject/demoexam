<?php
session_start();
require_once '../core/db.php';

$login = $_POST['login'];
$password = $_POST['password'];

$query = "SELECT * FROM `users` WHERE `login` = '$login' LIMIT 1";
$response = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($response);
if(!$user) {
    $_SESSION['errors']['login'] = 'Неверный логин или пароль';
    header('Location: ../../login.php');
}
if($user['password'] == $password) {
    $_SESSION['user'] = $user;
    if(($user['user_level']) == 1) {
        header('Location: ../../admin/index.php');
    } else{
    header('Location: ../../index.php');
    }
} else {
    $_SESSION['errors']['password'] = 'Неверный логин или пароль';
    header('Location: ../../login.php');
}