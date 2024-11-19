<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информация о пользователе</title>
</head>
<body>
    <h1>Информация о пользователе</h1>
    <p>Логин: <?= htmlspecialchars($user['username']) ?></p>
    <p>IP-адрес: <?= $_SERVER['REMOTE_ADDR'] ?></p>
    <p>User Agent: <?= htmlspecialchars($_SERVER['HTTP_USER_AGENT']) ?></p>

    <a href="index.php">Выйти</a>
    <a href="account.php">Список пользователей</a>
</body>
</html>
