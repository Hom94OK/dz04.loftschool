<?php

require_once('connect-pdo.php');
// Проверка пользователя
$login_check = $pdo->prepare("SELECT * FROM users WHERE login = :login and password = :password");
$login_check->execute([
	':login' => $_SESSION['login'],
	':password' => $_SESSION['password']
]);
$session_data = $login_check->fetch(PDO::FETCH_ASSOC);
$session_login = $session_data['login'];
