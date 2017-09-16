<?php

//require_once('verification.php');
require_once('message.php');
require_once('connect-pdo.php');

$login = $_POST['login'];
$password = $_POST['password'];

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

// Проверка авторизации
if (!empty($user_login)) {
    if (!empty($_COOKIE['PHPSESSID'])) {
        session_start();
        $_SESSION['login'] = $user_login;
        $_SESSION['password'] = $user_password;
        header("Refresh: 1;");
    } else {
        echo '123';
    }
    message('Добро пожаловать авторизация успешная нажмите продолжить', 'success', true);
    die();
} else {
    message('Логин или Пароль введены неправильно');
    die();
}

