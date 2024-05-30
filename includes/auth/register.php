<?php
session_start();
require_once '../core/db.php';

$login = $_POST['login'];
$password = $_POST['password'];
$passwordconfirm = $_POST['passwordconfirm'];
$fio = $_POST['fio'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];

if($login == '') {
    $_SESSION['errors']['login'] = '(Поле обязательно для заполнения.)';
}
if($password == '') {
    $_SESSION['errors']['login'] = '(Поле обязательно для заполнения.)';
}
if($passwordconfirm == '') {
    $_SESSION['errors']['passwordconfirm'] = '(Подтвердите свой пароль.)';
}
if($password != $passwordconfirm) {
    $_SESSION['errors']['password'] = '(Пароли не совпадают.)';
    $_SESSION['errors']['passwordconfirm'] = '(Пароли не совпадают.)';
}
if($fio == '') {
    $_SESSION['errors']['fio'] = '(Поле обязательно для заполнения.)';
}

if($telephone == '') {
    $_SESSION['errors']['telephone'] = '(Поле обязательно для заполнения.)';
}
if($email == '') {
    $_SESSION['errors']['email'] = '(Поле обязательно для заполнения.)';
}

if(strlen($password) < 8) {
    $_SESSION['errors']['password'] = '(Пароль должен содержать не менее 8-ми символов.)';
}
if(isset($_SESSION['errors'])) {
    header('Location: ../../register.php');
    die;
}

$query = "INSERT INTO `users` (`login`, `password`, `fio`, `telephone`, `email`) VALUES ('$login', '$password', '$fio', '$telephone', '$email')";
$response = mysqli_query($db, $query);
header('Location: ../../login.php');

