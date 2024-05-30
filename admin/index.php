<?php
session_start();
require_once '../includes/core/db.php';
if(!isset($_SESSION['user'])) {
    header('Location: ../login.php');
}
if($_SESSION['user']['user_level'] == 0) {
    header('Location: ../index.php');
}
$query = "SELECT * FROM `statements`";
$response = mysqli_query($db, $query);
$statements = mysqli_fetch_all($response, 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <title>Админ-панель</title>
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
                <a href="#" class="myStatements active">Админ-панель</a>
            </div>
            <div class="menuRight">
            <span class="login"><?=$_SESSION['user']['login']?></span>
                    <form action="../includes/auth/logout.php" method="POST">
                        <button class="logout">Выход</button>
                    </form>
            </div>
        </div>
    </header>
    <main>
    <div class="statementTitle">Админ-панель</div>
        <div class="statementsContainer">
            <?php foreach($statements as $statement) { ?>
            <div class="statementCard">
                <span class="GRNtitle">ГРН Нарушителя</span>
                <span class="GRN"><?= $statement['grn'] ?></span>
                <span class="statementDescriptionTitle">Описание нарушения</span>
                <p class="statementDescription">"<?= $statement['grn_desc'] ?>”</p>
                <div class="flexadmin">
                    <?php
                    if($statement['statement_status'] == 'Новая') { ?>
                    <a href="../includes/admin/setStatus.php?statement_status=Решена&id=<?=$statement['id']?>" class="confirm">Подтвердить</a>
                    <a href="../includes/admin/setStatus.php?statement_status=Отклонена&id=<?=$statement['id']?>" class="decline">Отклонить</a>
                    <?php } ?>
                </div>
                <span class="statementConfirm"><?=$statement['statement_status'] == 'Решена' ? $statement['statement_status'] : ''?></span>
                <span class="statementDecline"><?=$statement['statement_status'] == 'Отклонена' ? $statement['statement_status'] : ''?></span>
            </div>
            <?php } ?>
        </div>
    </main>
</body>
</html>