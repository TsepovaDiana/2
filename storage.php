<?php
$users = [];

for ($i = 1; $i <= 100; $i++) 
{
    $users[] = ['username' => 'user' . $i, 'password' => password_hash('pass' . $i, PASSWORD_DEFAULT)];
}
return $users;