<?php

if (empty($login) && empty($password)) {
	message('Вы не ввели логин или пароль.');
	die();
}

$hash_password = hash("sha3-224", $password . 'salt');

// Проверка пользователя
$login_check = $pdo->prepare("SELECT * FROM users WHERE login = :login and password = :password");
$login_check->execute([
	':login' => $login,
	':password' => $hash_password
]);
$check_data = $login_check->fetch(PDO::FETCH_ASSOC);
$user_login = $check_data['login'];
$user_password = $check_data['password'];