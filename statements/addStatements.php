<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <title>Создать заявление</title>
</head>
<body>
    <header>
        <div class="header_container">
            <div class="logo">
                <a href="#">
                <img src="../assets/images/logo.png" alt="logotype">
                <span>Нарушениям.нет</span>
                </a>
            </div>
            <div class="menuCenter">
                <a href="../index.php" class="myStatements">Заявления</a>
            </div>
            <div class="menuRight">
            <?php
                if(!isset($_SESSION['user'])) { ?>
                <a href="./login.php" class="login">Вход</a>
                <a href="./register.php" class="register">Регистрация</a>
                <?php } else { ?>
                    <span class="login"><?=$_SESSION['user']['login']?></span>
                    <form action="./includes/auth/logout.php" method="POST">
                        <button class="logout">Выход</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </header>
    <main>
        <div class="statementTitle">Создать заявление</div>
        <div class="statementsContainer">
            <div class="statementCardAdd">
                <form action="../includes/statements/addStatement.php" method="POST">
                    <span>ГРН Нарушителя</span>
                    <input type="text" name="grn">
                    <span>Описание нарушения</span>
                    <textarea name="grn_desc"></textarea>
                    <button>Создать</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>