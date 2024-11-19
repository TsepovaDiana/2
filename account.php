<?php
$users = require 'storage.php';

$count = isset($_GET['count']) ? (int)$_GET['count'] : 10;
$count = max(1, min($count, count($users)));
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список пользователей</title>
</head>
<body>
    <h1>Список пользователей</h1>
    <form method="get">
        <label for="count">Количество пользователей для отображения:</label>
        <input type="number" name="count" id="count" value="<?= $count; ?>" min="1" max="<?= count($users); ?>">
        <button type="submit">Показать</button>
    </form>
    
    <ul>
        <?php for ($i = 0; $i < $count; $i++): ?>
            <li><?= htmlspecialchars($users[$i]['username']); ?></li>
        <?php endfor; ?>
    </ul>
    <a href="index.php">Выйти</a>
</body>
</html>