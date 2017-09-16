<?php

require_once('connect-pdo.php');
require_once('message.php');

$login = $_POST['login'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$name = $_POST['name'];
$age = $_POST['age'];
$description = $_POST['description'];

$file = $_FILES['photo'];
//$photo = $file['name'];
require_once("vendor/autoload.php"); //Подключаем composer
use Intervention\Image\ImageManagerStatic as Image;

if (!empty($login) && !empty($password1) && !empty($password2) &&
	!empty($name) && !empty($age) && !empty($description) && !empty($file)) {
	// Проверка пользователя
	$login_check = $pdo->prepare("SELECT * FROM users WHERE login = :login");
	$login_check->execute([
		':login' => $login
	]);
	$check_data = $login_check->fetch(PDO::FETCH_ASSOC);
	$user_login = $check_data['login'];
	switch (false) {
		case preg_match('|^[a-zA-Z0-9-]{5,15}$|', $login):
			message('Логин должен содержать только латинские буквы или цифры и иметь длину более 5 символов.');
			die();
			break;
		case empty($user_login):
			echo '<strong class="registration-no">Пользователь с таким логином уже существует!!! Попробуйте другой</strong> <br>';
			die();
		case $password1 != $password2:
			$password = $password1;
			if (!(preg_match('|^(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$|', $password))) {
				message('Пароль должен содержать как минимум одну заглавную букву, одну маленькую букву, одну цифру и длину 8 символов.');
				die();
			};
			break;
		case $password1 == $password2:
			message('Пароль не совпадает');
			die();
			break;
		case preg_match('|^\d{1,2}$|', $age):
			message('Укажите корректное число');
			die();
			break;
		default:
			echo 'Все ок';
	}
} else {
	message('Вы не заполнили какое-то поле');
	die();
}

function uploadPhotoAndResize($photoFiles, $nameFile, $width = 100, $height = 100)
{
/////////  Загрузка фото
	if (preg_match('/jpg/', $photoFiles['name']) or
		preg_match('/png/', $photoFiles['name']) or
		preg_match('/gif/', $photoFiles['name'])) { //Проверяем имя файла. У нас PNG - файл проходит
		if (preg_match('/jpeg/', $photoFiles['type']) or
			preg_match('/png/', $photoFiles['type']) or
			preg_match('/gif/', $photoFiles['type'])) {
			//Проверяем mime type - у нас GIF. Все Ок
//			echo 'Файл имеет верный mime-type. "Доверяем" и загружаем его' . PHP_EOL;
			$img = Image::make($photoFiles['tmp_name']); //Открываем
			$img->resize($width, $height); //Изменяем размер
			$img->save('../photos/' . $nameFile . '.jpg'); //Сохраняем с новым именем
		} else {
			message('Название ок mime type нет');
			die();
		}
	} else {
		message("Ошибка итд");
	}
/////////////////////////////////
}

//validationFormRegister();

uploadPhotoAndResize($file, $login);

$name = strip_tags($name);
$description = strip_tags($description);


$hash_password = hash("sha3-224", $password . 'salt');
$users_bd = $pdo->prepare("INSERT INTO `file-repository`.users (login, password, name, age, description, img)
	VALUES (:login, :password, :name, :age, :description, :img)");
$users_bd->execute([
	':login' => $login,
	':password' => $hash_password,
	':name' => $name,
	':age' => $age,
	':description' => $description,
	':img' => $login . '.jpg'
]);

$email_check = $pdo->prepare("SELECT * FROM users WHERE login = :login");
$email_check->execute([
	':login' => $login
]);
$check_data = $email_check->fetch(PDO::FETCH_ASSOC);
$user_id = $check_data['userID'];

echo '<strong class="registration-ok">Поздравляем !!! Вы прошли регистрацию.</strong><br>';
echo '<b>Вам присвоено: </b></br>';
echo '<b>ID пользователя: </b>' . $user_id . '</br>';
echo '<b>Логин: </b>' . $login . '</br>';
echo '<b>Пароль: </b>' . $password . '</br>';

