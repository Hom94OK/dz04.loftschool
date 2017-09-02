<?php

// CONNECT
$host = 'localhost';
$db = 'file-repository';
$user = 'root';
$pass = '';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);

$pdo->query("CREATE DATABASE IF NOT EXISTS `file-repository`");
$pdo->query('use file-repository;');
$pdo->query("CREATE TABLE IF NOT EXISTS `file-repository`.users (
    userID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    login VARCHAR(100),
    password CHAR(128),
    name VARCHAR(100),
    age INT,
    description TINYTEXT,
    img VARCHAR(150)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

//$users = $pdo->query('SHOW TABLES LIKE "users"');
////$order = $pdo->query('SHOW TABLES LIKE "orders"');
//if (!($users->rowCount())) {
//	if (!($users->rowCount())) {
//		echo '<b class="error-message">Таблица users не найдена потому она будет создана.</b><br>';
//		$pdo->query('CREATE TABLE users
//(
//    userID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
//    login VARCHAR(100),
//    password CHAR(128)
//)');
//	}
////	if (!($order->rowCount())) {
////		echo '<b class="error-message">Таблица orders не найдена потому она будет создана.</b><br>';
////		$pdo->query('CREATE TABLE orders
////(
////	`ID заказа` INT PRIMARY KEY AUTO_INCREMENT,
////    `ID пользователя` INT,
////    Улица VARCHAR(100),
////    Дом INT,
////    Корпус VARCHAR(10),
////    Квартира VARCHAR(20),
////    Этаж VARCHAR(20),
////    Комментарий TEXT,
////    Оплата VARCHAR(50),
////    Перезвони VARCHAR(10)
////)');
////	}
//	echo 'Попробуйте еще раз.';
//	die();
//}

