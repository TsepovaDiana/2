<?php
session_start();
$users=require 'storage.php';
$errorMsg='';
if ($_SERVER['REQUEST_METHOD']==='POST')
{ 
    $username=$_POST['username'] ?? '';
    $password=$_POST['password'] ?? '';

    if (empty($username) || empty($password))
    {
        $errorMsg='Логин и пароль не должны быть пустыми!';
    }
    else 
    {
        foreach ($users as $user)
        {
            if ($user['username']===$username && password_verify($password, $user['password'])) 
            { $_SESSION['user']=$user;
            header('Location: about.php');
            exit;}
        }
        $errorMsg='Неправильный логин или пароль';
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>
    <h1>Форма Авторизации</h1>
    <?php if ($errorMsg): ?>
        <p style="color:red;"><?= $errorMsg; ?></p>
    <?php endif; ?>
    <form method="post">
        <label for="username">Логин:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Войти</button>
    </form>
</body>
</html>