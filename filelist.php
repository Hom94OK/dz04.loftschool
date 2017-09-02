<?php require_once('header.php') ?>

<div class="container" id="filelist">
	<?php if (!$session_data): ?>
        <h1 class="text-danger">Запретная зона, доступ только авторизированному пользователю.</h1>
		<?php
		die();
	endif; ?>
    <h2>Информация выводится из списка файлов</h2>
	<?php
	if ($_GET['file']) {
		echo 'Файл ' . $_GET['file'] . ' удален';
		unlink($photo_dir . $_GET['file']);
	}
	$scan_uploads = scandir($photo_dir);
	?>
    <table class="table table-bordered">
        <tr>
            <th>Название файла</th>
            <th>Фотография</th>
            <th>Действия</th>
        </tr>
		<?php for ($i = 2; $i <= count($scan_uploads) - 1; $i++) : ?>
            <tr>
                <td><?php echo $scan_uploads[$i] ?></td>
                <td><img src="<?php echo $photo_dir . $scan_uploads[$i] ?>" alt=""></td>
                <td>
                    <a href="filelist.php?file=<?php echo $scan_uploads[$i] ?>">Удалить аватарку пользователя</a>
                </td>
            </tr>
		<?php endfor; ?>
    </table>

</div><!-- /.container -->

<?php require_once('footer.php') ?>
