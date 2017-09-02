<?php
$login = $_POST['login'];
$password = $_POST['password'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$name = $_POST['name'];
$age = $_POST['age'];
$description = $_POST['description'];
$photo = $_FILES['photo']['name'];
$photo_dir = 'photos/';
$script_name = $_SERVER['SCRIPT_NAME'];