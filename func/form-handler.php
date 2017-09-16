<?php

require_once('variables.php');
require_once('message.php');
require_once('connect-pdo.php');
require_once('verification.php');

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

