<?php
session_start();

if(isset($_SESSION['user'])) {
    header('Location: index.php');
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
    <title>Регистрация</title>
</head>
<body>
<header>
        <div class="header_container">
            <div class="logo">
                <a href="./index.php">
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
            <?php
                if(!isset($_SESSION['user'])) { ?>
                <a href="./login.php" class="login">Вход</a>
                <a href="./register.php" class="register">Регистрация</a>
                <?php } else { ?>
                    <span class="login"></span>
                    <form action="./includes/auth/logout.php" method="POST">
                        <button class="logout">Выход</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </header>
    <main>
        <div class="registerform">
            <div class="formTitle">Нарушениям.нет</div>
            <div class="formDesc">Портал сознательных граждан</div>
            <div class="regTitle">Регистрация</div>
            <form action="./includes/auth/register.php" method="POST" class="Form">
                <label for="" class="formlabel">Логин <?= isset($errors['login']) ? $errors['login'] : '' ?></label>
                <input type="text" name="login">
                <label for="" class="formlabel">Пароль <?= isset($errors['password']) ? $errors['password'] : '' ?></label>
                <input type="password" name="password">
                <label for="" class="formlabel">Подверждение пароля <?= isset($errors['passwordconfirm']) ? $errors['passwordconfirm'] : '' ?></label>
                <input type="password" name="passwordconfirm">
                <label for="" class="formlabel">ФИО <?= isset($errors['fio']) ? $errors['fio'] : '' ?></label>
                <input type="text" name="fio">
                <label for="" class="formlabel">Номер телефона <?= isset($errors['telephone']) ? $errors['telephone'] : '' ?></label>
                <input type="text" name="telephone">
                <label for="" class="formlabel">Ваш Email <?= isset($errors['email']) ? $errors['email'] : '' ?></label>
                <input type="email" name="email">

                <button class="Go">Создать</button>
            </form>
            <span class="formlow">Уже есть учётная запись?</span>
            <a href="./login.php" class="loginGo">Вход</a>
        </div>
    </main>
</body>
</html>