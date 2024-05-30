<?php 
session_start();
if(isset($_SESSION['user'])) {
    header('Location: index.php');
}
if(isset($_SESSION['user']['user_level']) == 1) {
    header('Location: ./admin/index.php');
}

if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <title>Вход</title>
</head>
<body>
<header>
        <div class="header_container">
            
            <div class="logo">
                <a href="/index.php">
                <img src="./assets/images/logo.png" alt="logotype">
                <span>Нарушениям.нет</span>
                </a>
            </div>
            <div class="menuCenter">
            <?php
                if(isset($_SESSION['user'])) { ?>
                    <a href="./index.php" class="myStatements active">Заявления</a>
                    <?php } ?>
            </div>
            <div class="menuRight">
                <a href="./login.php" class="login">Вход</a>
                <a href="./register.php" class="register">Регистрация</a>
            </div>
        </div>
    </header>
    <main>
        <div class="registerform">
            <div class="formTitle">Нарушениям.нет</div>
            <div class="formDesc">Портал сознательных граждан</div>
            <div class="regTitle">Вход</div>
            <form action="./includes/auth/login.php" method="POST" class="Form">
                <label for="" class="formlabel">Логин <?= isset($errors['login']) ? $errors['login'] : '' ?></label>
                <input type="text" name="login">
                <label for="" class="formlabel">Пароль <?= isset($errors['password']) ? $errors['password'] : '' ?></label>
                <input type="password" name="password">

                <button class="Go">Войти</button>
            </form>
            <span class="formlow">У вас нет учётной записи?</span>
            <a href="./login.php" class="loginGo">Регистрация</a>
        </div>
    </main>
</body>
</html>