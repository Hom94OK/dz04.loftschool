<?php require_once('header.php') ?>

<div class="container" id="index">
	<?php if (!empty($session_data)) : ?>
        <h1>Вітаємо тепер ви з нами</h1>
	<?php else: ?>
        <div class="form-container">
            <form class="form-horizontal" id="form-login">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
                    <div class="col-sm-10">
                        <input name="login" type="text" class="form-control" id="inputEmail3" placeholder="Логин">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                    <div class="col-sm-10">
                        <input name="password" type="password" class="form-control" id="inputPassword3"
                               placeholder="Пароль">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" id="login-submit">Войти</button>
                        <br><br>
                        Нет аккаунта? <a href="reg.php">Зарегистрируйтесь</a>
                    </div>
                </div>
            </form>
        </div>
	<?php endif; ?>

</div><!-- /.container -->
<div class="f-popup__bg" id="f-order">
    <div class="f-popup__main">
        <a class="f-popup__close" href="#">
            <svg id="icon" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                <path fill-rule="evenodd" clip-rule="evenodd" fill="#E45028"
                      d="M9.831 7.494l4.673-4.673A1.651 1.651 0 1 0 12.167.484L7.494 5.157 2.82.483A1.653 1.653 0 0 0 .483 2.82l4.673 4.673-4.673 4.673a1.653 1.653 0 0 0 2.337 2.337L7.493 9.83l4.673 4.673c.646.646 1.691.646 2.337 0s.646-1.691 0-2.337L9.831 7.494z"/>
            </svg>
        </a>
        <div class="f-popup__title">Ваши последние заказы</div>
        <div class="f-popup__content">
            Загрузка ...
        </div>
    </div>
</div>

<?php require_once('footer.php') ?>