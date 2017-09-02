<?php require_once('header.php') ?>

<div class="container" id="reg">

    <div class="form-container">
        <form class="form-horizontal" id="form-reg">
            <div class="form-group">
                <label for="inputLogin" class="col-sm-4 control-label">Логин</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputLogin" name="login" placeholder="Логин">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword1" class="col-sm-4 control-label">Пароль</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="password1" id="inputPassword1"
                           placeholder="Пароль">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword2" class="col-sm-4 control-label">Пароль (Повтор)</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="password2" id="inputPassword2"
                           placeholder="Пароль">
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-4 control-label">Ваше имя</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" id="inputName" placeholder="Ваше имя">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAge" class="col-sm-4 control-label">Ваш возраст</label>
                <div class="col-sm-8">
                    <input type="number" name="age" id="inputAge"  min="12" max="100" step="1" placeholder="21">
                </div>
            </div>
            <div class="form-group">
                <label for="inputDescription" class="col-sm-4 control-label">Описания о себе</label>
                <div class="col-sm-8">
                    <textarea rows="4" cols="45" class="form-control" name="text" id="inputDescription"
                              placeholder="Описания о себе"></textarea>
                    <!--                    <input type="text" class="form-control" name="description" id="inputDescription"-->
                    <!--                           placeholder="Описания о себе">-->
                </div>
            </div>
            <div class="form-group">
                <label for="inputPhoto" class="col-sm-4 control-label">Ваше фото</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" name="photo" id="inputPhoto" value="Выбрать файл">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" id="reg-submit">Зарегистрироваться</button>
                    <br><br>
                    Зарегистрированы? <a href="index.php">Авторизируйтесь</a>
                </div>
            </div>
        </form>
    </div>

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
