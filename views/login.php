<h2>Login page</h2>
<?php
foreach($errors as $er){
    print $er;
}
?>
<div class="input-group input-group-prepend">
    <form action="" class="alert alert-warning" method="post">
        <p>
            <label>Ваш логин:<br></label>
            <input class="form-control form-control-file" name="login" type="text" size="15" maxlength="15">
        </p>
        <p>
            <label>Ваш пароль:<br></label>
            <input class="form-control form-control-file" name="password" type="password" size="15" maxlength="15">
        </p>
        <p>
            <input class="btn btn-outline-secondary btn-light " type="submit" name="submit" value="Войти">
            <br>
            <a href="index.php?path=register">Зарегистрироваться</a>
        </p>
    </form>
</div>
<div class="input-group input-group-prepend">
    <br>
</div>