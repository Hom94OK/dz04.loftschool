<?php require_once('header.php') ?>


<div class="container" id="list">
	<?php if (!$session_data): ?>
        <h1 class="text-danger">Запретная зона, доступ только авторизированному пользователю.</h1>
		<?php
		die();
	endif; ?>
    <h2>Информация выводится из базы данных</h2>
	<?php

	if ($_GET['dell-user']) {
//		$_GET['dell-user'];
		$dell_photo = $pdo->prepare("SELECT img FROM users WHERE login=:login;");
		$dell_photo->execute([
			':login' => $_GET['dell-user']
		]);
		$dell_photo = $dell_photo->fetch(PDO::FETCH_ASSOC);
		if ($dell_photo) {
			unlink($photo_dir . $dell_photo['img']);
			$dell_user = $pdo->prepare("DELETE FROM users WHERE login=:login;");
			$dell_user->execute([
				':login' => $_GET['dell-user']
			]);
		} else {
			message('Вы пытаетесь удалить несуществующий аккаунт');
		}
	}

	$file_check = $pdo->query("SELECT login, name, age, description, img FROM users;");
	$result = $file_check->fetchall(PDO::FETCH_ASSOC);
	?>
    <table class="table table-bordered">
        <tr>
            <th>Пользователь(логин)</th>
            <th>Имя</th>
            <th>возраст</th>
            <th>описание</th>
            <th>Фотография</th>
            <th>Действия</th>
        </tr>
		<?php foreach ($result as $value) : ?>
            <tr>
                <td><?php echo $value['login'] ?></td>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['age'] ?></td>
                <td><?php echo $value['description'] ?></td>
                <td><img src="<?php echo $photo_dir . $value['img'] ?>" alt=""></td>
                <td>
                    <a href="list.php?dell-user=<?php echo $value['login'] ?>">Удалить пользователя</a>
                </td>
            </tr>
		<?php endforeach; ?>
    </table>

</div><!-- /.container -->


<?php require_once('footer.php') ?>
