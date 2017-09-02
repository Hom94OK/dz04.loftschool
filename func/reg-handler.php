<?php

require_once('connect-pdo.php');
require_once('message.php');
require_once('variables.php');


//$login = $_POST['login'];
//$password = $_POST['password'];
//$password1 = $_POST['password1'];
//$password2 = $_POST['password2'];
//$name = $_POST['name'];
//$age = $_POST['age'];
//$description = $_POST['description'];

$file = $_FILES['photo'];
//$photo = $file['name'];
require_once ("vendor/autoload.php"); //Подключаем composer
use Intervention\Image\ImageManagerStatic as Image;

if (!empty($login) && !empty($password1) && !empty($password2) && !empty($name) && !empty($age) && !empty($description) && !empty($file)) {
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
	/////////  Загрузка фото
	if (preg_match('/jpg/', $file['name']) or preg_match('/png/', $file['name']) or preg_match('/gif/', $file['name'])) { //Проверяем имя файла. У нас PNG - файл проходит
		if (preg_match('/jpeg/', $file['type']) or preg_match('/png/', $file['type']) or preg_match('/gif/', $file['type'])) {
			//Проверяем mime type - у нас GIF. Все Ок
//			echo 'Файл имеет верный mime-type. "Доверяем" и загружаем его' . PHP_EOL;
			$img = Image::make($file['tmp_name']); //Открываем
			$img->resize(100, 100); //Изменяем размер
			$img->save('../photos/' . $login. '.jpg'); //Сохраняем с новым именем
		} else {
			echo "Выводим результат проверки: file-type: " . mime_content_type('../photos/' . $login. '.jpg') . PHP_EOL;
			echo 'Название ок mime type нет';
			die();
		}
	} else {
		die("Ошибка итд");
	}
	/////////////////////////////////
} else {
	message('Вы не заполнили какое-то поле');
	die();
}

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


//$file = $_FILES['photo'];
//
//$dir = '../photos';
//
//if (!file_exists($dir)) {
//	mkdir($dir, 0777);
//}
//$file_name = $dir . '/' . $file['name'];
//
//if (move_uploaded_file($file['tmp_name'], $file_name)) {
//	echo "<p>Файл успешно загружен</p>";
//	echo '<p>Путь до файла: ' . $file_name . '</p>';
//	echo '<p><a href="' . $file_name . '" target="_blank">открыть файл</a></p>';
//} else {
//	echo "Возникла ошибка при загрузке файла";
//}
