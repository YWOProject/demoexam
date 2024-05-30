<?php
session_start();
require_once './includes/core/db.php';
if(!isset($_SESSION['user'])) {
    header('Location: ./login.php');
}
$user_id = $_SESSION['user']['id'];
$query = "SELECT * FROM `statements` WHERE `user_id` = '$user_id'";
$response = mysqli_query($db, $query);
$statements = mysqli_fetch_all($response, 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <title>Главная</title>
</head>
<body>
    <header>
        <div class="header_container">
            <div class="logo">
                <a href="#">
                <img src="./assets/images/logo.png" alt="logotype">
                <span>Нарушениям.нет</span>
                </a>
            </div>
            <div class="menuCenter">
                <?php
                if(isset($_SESSION['user'])) { ?>
                    <a href="#" class="myStatements active">Заявления</a>
                    <?php } ?>
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
        <div class="statementTitle">Заявления</div>
        <div class="statementsContainer">
            <?php foreach($statements as $statement) { ?>
            <div class="statementCard">
                <span class="GRNtitle">ГРН Нарушителя</span>
                <span class="GRN"><?= $statement['grn'] ?></span>
                <span class="statementDescriptionTitle">Описание нарушения</span>
                <p class="statementDescription">“<?= $statement['grn_desc'] ?>”</p>
                <span class="statement<?= ($statement['statement_status'] == 'Новая' || $statement['statement_status'] == 'Решена') ? 'Confirm' : 'Decline'?>"><?=$statement['statement_status']?></span>
                <!-- <span class="statementDecline"><?=$statement['statement_status'] == 'Отклонена' ? $statement['statement_status'] : ''?></span> -->
            </div>
            <?php } ?>
            <div class="statementCardPlus">
                <a href="./statements/addstatements.php" class="createNewStatement">
                    <span class="plus">+</span>
                    <span class="plusTitle">Создать новое заявление</span>
                </a>
            </div>
        </div>
    </main>
</body>
</html>